<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function getPlaylistTracks($playlistId)
    {
        $playlist = Playlist::with('tracks.artist.user')->findOrFail($playlistId);
        return response()->json(['tracks' => $playlist->tracks]);
    }
}
