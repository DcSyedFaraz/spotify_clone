<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];
    public function merchItem()
    {
        return $this->belongsTo(MerchItem::class);
    }
}
