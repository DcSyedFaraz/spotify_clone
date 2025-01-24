<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Blog;
use App\Models\LikedSong;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;
use Log;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    // Start Selling page
    public function startSelling()
    {
        $artists = Artist::all();
        $albums = Album::all();
        $tracks = Track::where('approved', 1)->get();

        return view('frontend.spotify.main_screen', compact('artists', 'albums', 'tracks'));
    }

    // Explore page
    public function explore()
    {
        return view('frontend.explore');
    }

    // Creator Tools page
    public function creatorTools()
    {
        return view('frontend.creator-tools');
    }

    // Feeds page
    public function feeds()
    {
        return view('frontend.feeds');
    }

    // Tracks page
    public function tracks()
    {
        return view('frontend.tracks');
    }

    // Trending page
    public function trending()
    {
        return view('frontend.trending');
    }

    // Feature page
    public function feature()
    {
        return view('frontend.feature');
    }

    // Most Liked page
    public function mostLiked()
    {
        return view('frontend.most-liked');
    }

    // Sign Up page
    public function signUp()
    {
        return view('auth.sign-up');
    }

    // Sign In page
    public function signIn()
    {
        return view('auth.sign-in');
    }

    public function blog()
    {
        $blogs = Blog::get();
        return view('frontend.blog', compact('blogs'));
    }

    public function showBlogDetail($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.blog-detail', compact('blog'));
    }

    public function music()
    {
        return view('frontend.music');
    }

   

    public function event()
    {

        return view('frontend.events');
    }

    public function artist()
    {
        $users = User::with('artist')->get();
        return view('frontend.artist', compact('users'));
    }

    public function showArtistDetail($id)
    {
        $user = User::with('artist.events', 'artist.tracks')->findOrFail($id);
        // dd($user);
        return view('frontend.artist-detail', compact('user'));
    }




}
