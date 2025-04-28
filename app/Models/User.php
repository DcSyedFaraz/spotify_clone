<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function artist()
    {
        return $this->hasOne(Artist::class);
    }
    public function casesCreated()
    {
        return $this->hasMany(Cases::class, 'created_by');
    }
    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
    public function merchItems()
    {
        return $this->hasMany(MerchItem::class);
    }

}
