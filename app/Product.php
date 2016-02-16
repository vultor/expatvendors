<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
    	'title',
        'description',
    	'currency',
    	'price',
    	'unit',
        'priceunit',
    	'image',
    	'status',
        'user_id',
    	'shipping',
    	'shipping_cost'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
