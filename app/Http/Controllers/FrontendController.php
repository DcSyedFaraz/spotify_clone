<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Blog;
use App\Models\Genre;
use App\Models\LikedSong;
use App\Models\Tag;
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
    public function trending(Request $request)
    {
        $query = Track::with('artist.user', 'genre', 'tags')
            ->withCount([
                'plays as recent_plays_count' => function ($q) {
                    $q->where('played_at', '>=', now()->subDays(7));
                }
            ])
            ->where('approved', 1);

        if ($request->filled('genre')) {
            $query->where('genre_id', $request->input('genre'));
        }

        if ($request->filled('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->whereKey($request->input('tag'));
            });
        }

        $trendingTracks = $query->orderByDesc('recent_plays_count')
            ->limit(12)
            ->get();

        $trendingTags = Tag::withCount('tracks')
            ->orderByDesc('tracks_count')
            ->limit(10)
            ->get();

        $genres = Genre::all();

        return view('frontend.trending', compact('trendingTracks', 'trendingTags', 'genres'));
    }

    // Feature page
    public function feature()
    {
        $latestTracks = Track::with('artist')
            ->where('approved', 1)
            ->latest()
            ->take(5)
            ->get();

        $playlist = Track::with(['artist', 'album'])
            ->withCount('plays')
            ->where('approved', 1)
            ->orderByDesc('plays_count')
            ->take(5)
            ->get();

        return view('frontend.feature', compact('latestTracks', 'playlist'));
    }

    // Most Liked page
    public function mostLiked()
    {
        $tracks = Track::with('artist')
            ->withCount('likes')
            ->where('approved', 1)
            ->orderByDesc('likes_count')
            ->take(20)
            ->get();

        return view('frontend.most-liked', compact('tracks'));
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
