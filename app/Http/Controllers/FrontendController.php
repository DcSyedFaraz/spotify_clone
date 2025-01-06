<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
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
        // $user = auth()->user();
        // if ($user->subscription('default')->onTrial()) {
        //     $user->subscription('default')->endTrial();
        // }

        // if ($user->subscribed('default')) {
        //     // Mark the subscription as canceled or expired (or whatever action you want)
        //     $user->subscription('default')->cancelNow();
        // }
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

}
