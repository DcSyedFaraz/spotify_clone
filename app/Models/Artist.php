<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $guarded = [];
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tracks()
    {
        return $this->hasMany(Track::class);
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
    public function casesCount()
    {
        return $this->hasMany(Cases::class)->where('status','open');
    }
}
