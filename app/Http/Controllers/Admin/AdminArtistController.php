<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Http\Request;

class AdminArtistController extends Controller
{
    public function index()
    {
        // Get all artists, including their user data (active/suspended status)
        $artists = Artist::with('user')->paginate(10);
        return view('admin.artists.index', compact('artists'));
    }

    public function create()
    {
        return view('admin.artists.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'bio' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'facebook' => 'nullable|string',
        ]);

        // Create the user first
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Assign the 'artist' role
        $user->assignRole('artist');

        // Now create the artist
        $artist = new Artist();
        $artist->user_id = $user->id;
        $artist->bio = $request->bio;
        $artist->twitter = $request->twitter;
        $artist->instagram = $request->instagram;
        $artist->facebook = $request->facebook;
        $artist->save();

        return redirect()->route('artists.index')->with('success', 'Artist created successfully!');
    }

    public function edit(Artist $artist)
    {
        return view('admin.artists.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'bio' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'facebook' => 'nullable|string',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;

        // Only update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        // Find the associated artist
        $artist = Artist::where('user_id', $user->id)->firstOrFail();

        // Update artist details
        $artist->bio = $request->bio;
        $artist->twitter = $request->twitter;
        $artist->instagram = $request->instagram;
        $artist->facebook = $request->facebook;
        $artist->save();

        return redirect()->route('artists.index')->with('success', 'Artist updated successfully!');
    }


    public function destroy(Artist $artist)
    {
        // Optionally delete associated files or data here
        $artist->delete();
        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully!');
    }

    public function suspend(User $user)
    {
        $user->is_active = !$user->is_active; // Toggle the suspension status
        $user->save();

        $status = $user->is_active ? 'activated' : 'suspended';
        return redirect()->route('artists.index')->with('success', "User account $status successfully!");
    }
}
