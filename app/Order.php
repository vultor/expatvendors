<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'buyer_id',
        'product_id',
        'quantity',
        'subtotal',
        'status'
    ];

    /**
     * The orders that belong to the user.
     */
    public function buyer()
    {
        return $this->belongsToMany('App\User');
    }
}
