<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    // Start Selling page
    public function startSelling()
    {
        return view('frontend.start-selling');
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

    // Subscription page
    public function subscription()
    {
        return view('frontend.subscription');
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
