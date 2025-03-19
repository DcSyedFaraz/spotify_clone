<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\MerchItem;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{

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
