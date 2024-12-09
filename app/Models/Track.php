<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $guarded = [];
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
    // public function user()
    // {
    //     return $this->hasOneThrough(User::class, Artist::class);
    // }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_track');
    }
}
