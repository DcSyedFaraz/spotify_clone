<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Cart;
use App\Models\MerchItem;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all merch items and categories (artists)
        $merchItems = $this->getMerchItems($request);

        // Check if the user is authenticated and retrieve the wishlist and cart items
        $wishlist = $this->getUserItems('wishlist');
        $cartItems = $this->getUserItems('cartItems');

        // Get a list of artists for the category filter
        $artists = Artist::with('user')->get();

        return view('marketplace.index', compact('merchItems', 'wishlist', 'artists', 'cartItems'));
    }

    public function addToCart(MerchItem $merchItem)
    {
        if (!Auth::check()) {
            return $this->redirectToLoginWithMessage('You need to login to add to cart.');
        }

        // Add or remove item from cart
        return $this->toggleItemInCart($merchItem);
    }

    public function addToWishlist(MerchItem $merchItem)
    {
        if (!Auth::check()) {
            return $this->redirectToLoginWithMessage('You need to login to add to wishlist.');
        }

        // Add or remove item from wishlist
        return $this->toggleItemInWishlist($merchItem);
    }

    // Helper method to retrieve user's items (wishlist/cartItems)
    private function getUserItems(string $itemType)
    {
        return Auth::check() ? Auth::user()->$itemType()->pluck('merch_item_id')->toArray() : [];
    }

    // Helper method to retrieve merch items based on search query
    private function getMerchItems(Request $request)
    {
        return MerchItem::with('artist.user', 'images') // Eager load artist and their user for the name
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%")
                    ->orWhereHas('artist.user', function ($query) use ($request) {
                        $query->where('name', 'like', "%{$request->search}%");
                    });
            })
            ->when($request->has('artists') && is_array($request->artists), function ($query) use ($request) {
                $query->whereIn('artist_id', $request->artists);
            })
            ->get();
    }



    // Helper method to handle redirect when not logged in
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

    // Helper method to add or remove item from wishlist
    private function toggleItemInWishlist(MerchItem $merchItem)
    {
        $existingWishlistItem = Wishlist::where('user_id', Auth::id())
            ->where('merch_item_id', $merchItem->id)
            ->first();

        if ($existingWishlistItem) {
            $existingWishlistItem->delete();
            return redirect()->route('marketplace.index')->with('success', 'Item removed from wishlist.');
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'merch_item_id' => $merchItem->id,
        ]);

        return redirect()->route('marketplace.index')->with('success', 'Item added to wishlist.');
    }
}
