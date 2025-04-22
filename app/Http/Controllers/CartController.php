<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\MerchItem;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        // Retrieve all wishlist items
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('merchItem.images')
            ->get();

        // Calculate subtotal.
        $subtotal = $cartItems->sum(fn($item) => $item->merchItem->price * $item->quantity);

        // Example sales tax rate (10%).
        $salesTax = $subtotal * 0.10;

        // Apply coupon discount if available.
        $coupon = session('coupon');
        $couponDiscount = 0;
        if ($coupon) {
            // Assuming coupon discount is a fixed amount.
            $couponDiscount = $coupon->discount_amount;
        }

        // Calculate grand total.
        $grandTotal = $subtotal + $salesTax - $couponDiscount;

        return view('cart.index', compact('cartItems', 'subtotal', 'salesTax', 'grandTotal'));
    }
    public function update(Request $request, Cart $cartItem)
    {
        // 1. Validate
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        // 2. Persist
        $cartItem->update([
            'quantity' => $request->input('quantity'),
        ]);

        // 3. If AJAX, return JSON with rendered summary partial
        if ($request->wantsJson()) {
            $subtotal = auth()->user()->cartItems->sum(fn($item) => $item->merchItem->price * $item->quantity);
            $salesTax = $subtotal * config('cart.tax_rate', 0.00);
            $grandTotal = $subtotal + $salesTax;

            $html = view('partials.cart_summary', compact('subtotal', 'salesTax', 'grandTotal'))
                ->render();

            return response()->json(['updatedTotalsHtml' => $html]);
        }

        // 4. Fallback full‑page redirect
        return redirect()
            ->back()
            ->with('success', 'Cart updated successfully.');
    }
    private function getUserItems(string $itemType)
    {
        return Auth::check() ? Auth::user()->$itemType()->pluck('merch_item_id')->toArray() : [];
    }
    public function addToCart(MerchItem $merchItem)
    {
        if (!Auth::check()) {
            return $this->redirectToLoginWithMessage('You need to login to add to cart.');
        }

        // Add or remove item from cart
        return $this->toggleItemInCart($merchItem);
    }
    private function redirectToLoginWithMessage(string $message)
    {
        return redirect()->route('login')->with('error', $message);
    }

    // Helper method to add or remove item from cart
    private function toggleItemInCart(MerchItem $merchItem)
    {
        $existingCartItem = Cart::where('user_id', Auth::id())
            ->where('merch_item_id', $merchItem->id)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->delete();
            return redirect()->route('marketplace.index')->with('success', 'Item removed from cart.');
        }

        Cart::create([
            'user_id' => Auth::id(),
            'merch_item_id' => $merchItem->id,
        ]);

        return redirect()->route('marketplace.index')->with('success', 'Item added to cart.');
    }
}
