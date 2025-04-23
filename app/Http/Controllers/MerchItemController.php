<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\MerchItem;
use App\Models\MerchItemImage;
use Auth;
use Illuminate\Http\Request;

class MerchItemController extends Controller
{
    public function create()
    {
        $artists = Artist::all();
        return view('merch.create', compact('artists'));
    }
    public function destroy(MerchItem $merchItem)
    {
        // Delete all associated images
        foreach ($merchItem->images as $image) {
            \Storage::delete("public/{$image->image_path}");
            $image->delete();
        }

        // Delete the merch item
        $merchItem->delete();

        return redirect()->back()->with('success', 'Merch item rejected and deleted successfully.');
    }
    public function store(Request $request)
    {
        // dd( 	    $request->all());
        $request->validate([
            'artist_id' => 'required|exists:artists,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|max:999999.99',
            'images' => 'required|array',
            'images.*' => 'image',
        ]);

        // Create the merch item
        $merchItem = MerchItem::create([
            'artist_id' => $request->artist_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Store multiple images
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('images/merch', 'public');
            MerchItemImage::create([
                'merch_item_id' => $merchItem->id,
                'image_path' => $imagePath,
            ]);
        }

        return redirect()->route('artist.merch.index')->with('success', 'Merch item created successfully.');
    }

    public function index()
    {
        $merchItems = MerchItem::with('artist', 'images')->get();
        return view('merch.index', compact('merchItems'));
    }

    public function adminIndex()
    {
        $merchItems = MerchItem::with('artist', 'images')->where('approved', false)->get();
        $approvedItems = MerchItem::where('approved', true)->get();
        return view('admin.merch.index', compact('merchItems', 'approvedItems'));
    }

    public function approve(MerchItem $merchItem)
    {
        $merchItem->update(['approved' => true]);
        return redirect()->back()->with('success', 'Merch item approved successfully.');
    }

    public function edit(MerchItem $merchItem)
    {
        return view('admin.merch.edit', compact('merchItem'));
    }
    public function artistedit(MerchItem $merchItem)
    {
        // dd($merchItem);
        return view('merch.create', compact('merchItem'));
    }

    public function update(Request $request, MerchItem $merchItem)
    {
        // if (Auth::user()->hasRole('admin')) {
        //     return redirect()->route('admin.merch.index')->with('error', 'Merch is already approved.');
        // }
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|max:999999.99',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image',
        ]);

        // Update the basic information of the merch item
        $merchItem->update($request->only('description', 'price', 'name'));

        foreach ($merchItem->images as $image) {
            \Storage::delete("public/{$image->image_path}");
            $image->delete();
        }

        // Add new images if any
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images/merch', 'public');
                MerchItemImage::create([
                    'merch_item_id' => $merchItem->id,
                    'image_path' => $imagePath,
                ]);
            }
        }
        if (Auth::user()->hasRole('artist')) {
            $merchItem->update(['approved' => false]);
            return redirect()->route('artist.merch.index')->with('success', 'Merch item updated successfully.');
        }
        return redirect()->route('admin.merch.index')->with('success', 'Merch item updated successfully.');
    }
}
