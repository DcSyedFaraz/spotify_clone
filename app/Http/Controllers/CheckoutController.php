<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Checkout;

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
        $order = Order::where('id', $id)->where('user_id', auth()->id())->first();
        if (empty($order)) {
            return redirect()->route('cart.index')->with('error', 'Order not found.');
        }

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

        $user = auth()->user();
        $cartItems = $user->cartItems()->with('merchItem')->get();
        // dd($cartItems);
        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate total price
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->merchItem->price * $item->quantity;
        }

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
        ]);

        // Insert order items
        $cartItems->each->update(['order_id' => $order->id]);


        // Redirect to payment page or order confirmation page
        return redirect()->route('payment.page', $order->id)->with('success', 'Order placed successfully.');
    }
}
