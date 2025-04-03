<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use DB;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->cartItems()->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cartItems'));
    }
    public function payment($id)
    {
        $order = Order::findOrFail($id);
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // If the order is already paid, redirect to the order detail page
        if ($order->payment_status !== 'pending') {
            return redirect()->route('orders.show', $order->id)
                ->with('info', 'This order has already been processed.');
        }

        $order->load('orderItems');

        return view('payment.page', compact('order'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'billing_name' => 'required|string|max:255',
            'billing_phone' => 'required|string|max:20',
            'billing_address1' => 'required|string|max:255',
            'billing_address2' => 'nullable|string|max:255',
            'billing_city' => 'required|string|max:100',
            'billing_state' => 'required|string|max:100',
            'billing_zip' => 'required|string|max:20',
            'shipping_name' => 'required|string|max:255',
            'shipping_address1' => 'required|string|max:255',
            'shipping_address2' => 'nullable|string|max:255',
            'shipping_city' => 'required|string|max:100',
            'shipping_state' => 'required|string|max:100',
            'shipping_zip' => 'required|string|max:20',
            'shipping_method' => 'required|string',
        ]);

        // dd($request->all());
        $user = auth()->user();
        $cartItems = $user->cartItems()->with('merchItem')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate total price
        $totalPrice = $cartItems->sum(fn($item) => $item->merchItem->price * $item->quantity);

        // Create the order using a DB transaction
        DB::beginTransaction();

        try {
            // Create the order
            $order = Order::create([
                'user_id' => $user->id,
                'email' => $validated['email'],
                'billing_name' => $validated['billing_name'],
                'billing_phone' => $validated['billing_phone'],
                'billing_address1' => $validated['billing_address1'],
                'billing_address2' => $validated['billing_address2'],
                'billing_city' => $validated['billing_city'],
                'billing_state' => $validated['billing_state'],
                'billing_zip' => $validated['billing_zip'],
                'shipping_name' => $validated['shipping_name'],
                'shipping_address1' => $validated['shipping_address1'],
                'shipping_address2' => $validated['shipping_address2'],
                'shipping_city' => $validated['shipping_city'],
                'shipping_state' => $validated['shipping_state'],
                'shipping_zip' => $validated['shipping_zip'],
                'shipping_method' => $validated['shipping_method'],
                'total_price' => $totalPrice,
                'payment_status' => 'pending',
            ]);

            // Create order items instead of updating cart items
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'merch_item_id' => $cartItem->merch_item_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->merchItem->price,
                    'name' => $cartItem->merchItem->name,
                    // Optional: Store additional product details for historical records
                    // 'options' => $cartItem->options ?? null,
                ]);
            }

            // Clear the user's cart after creating order items
            $user->cartItems()->delete();

            DB::commit();

            // Redirect to payment page
            return redirect()->route('payment.page', $order->id)->with('success', 'Order placed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create order: ' . $e->getMessage());
        }
    }
    public function charge(Request $request)
    {
        // Validate the request to ensure the stripeToken and order_id are provided.
        $request->validate([
            'stripeToken' => 'required|string',
            'order_id' => 'required|integer|exists:orders,id',
        ]);

        // Retrieve the order using the provided order_id.
        $order = Order::findOrFail($request->order_id);
        // Convert the order total to cents (Stripe uses cents)
        $amount = (int) ($order->total_price * 100);

        // Set your Stripe secret key from config/services.php.
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a new charge using the Stripe API.
            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'usd', // adjust currency if needed
                'description' => 'Payment for Order #' . $order->id,
                'source' => $request->stripeToken,
            ]);

            // Optionally update your order status and save the Stripe charge ID.
            $order->update([
                'payment_status' => 'paid',
                'stripe_charge_id' => $charge->id,
            ]);

            // Redirect to an order confirmation page or similar.
            return redirect()->route('marketplace.index', $order->id)
                ->with('success', 'Payment successful!');

        } catch (\Exception $e) {
            // In case of an error, you may log the error and return with an error message.
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function orderIndex()
    {
        $orders = auth()->user()->orders()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }


    public function orderShow(Order $order)
    {
        // Check if the order belongs to the authenticated user
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $order->load('orderItems.merchItem');

        return view('orders.show', compact('order'));
    }
}
