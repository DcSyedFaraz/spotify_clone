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
        $perPage = 8; // number of items per "page"
        $query = $this->getMerchItemsQuery($request);

        // use paginate on the builder
        $merchItems = $query->paginate($perPage)->withQueryString();

        // fetch user-specific IDs
        $wishlist = $this->getUserItems('wishlist');
        $cartItems = $this->getUserItems('cartItems');

        $trendingItems = MerchItem::with('artist.user', 'images')
            ->where('trending', true)
            ->get();
        // $trendingItems = $trendingItems->shuffle()->take(4);
        // AJAX requests get JSON with rendered HTML + next page URL
        if ($request->ajax()) {
            $html = view('marketplace.partials.items', compact('merchItems', 'wishlist', 'cartItems'))->render();

            return response()->json([
                'items' => $html,
                'next_page_url' => $merchItems->nextPageUrl(),
            ]);
        }

        // first full page load
        $artists = Artist::with('user')->get();

        return view('marketplace.index', compact('merchItems', 'wishlist', 'cartItems', 'artists', 'trendingItems'));
    }

    private function getUserItems(string $itemType): array
    {
        return Auth::check()
            ? Auth::user()->{$itemType}()->pluck('merch_item_id')->toArray()
            : [];
    }

    private function getMerchItemsQuery(Request $request)
    {
        return MerchItem::with('artist.user', 'images')
            ->when($request->search, function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                    ->orWhereHas('artist.user', fn($q2) => $q2->where('name', 'like', "%{$request->search}%"));
            })
            ->when($request->has('artists') && is_array($request->artists), function ($q) use ($request) {
                $q->whereIn('artist_id', $request->artists);
            });
    }
    public function show(MerchItem $merchItem)
    {
        // Load the item with its relationships
        $merchItem->load(['images', 'artist.user']);

        // Increment view count or track popularity (optional)
        // $merchItem->increment('views');

        // Get related items by the same artist or similar category
        $relatedItems = MerchItem::where('id', '!=', $merchItem->id)
            ->where(function ($query) use ($merchItem) {
                $query->where('artist_id', $merchItem->artist_id)
                    ->orWhere(function ($query) use ($merchItem) {
                        // You can add more similarity logic here
                        $query->where('id', '!=', $merchItem->id);
                    });
            })
            ->with(['images'])
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('marketplace.show', compact('merchItem', 'relatedItems'));
    }
}
