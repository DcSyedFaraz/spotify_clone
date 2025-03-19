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

}
