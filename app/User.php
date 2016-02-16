<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'shipping_address', 'city', 'vendor_name', 'vendor_email', 'vendor_phone', 'vendor_address', 'vendor_range'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user can have many products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * The orders that belong to the buyer.
     */
    public function orders()
    {
       return $this->hasMany('App\Order', 'buyer_id');
    }    

    /**
     * Get all of the orders for the user.
     */
    public function vendor_orders()
    {
        return $this->hasManyThrough('App\Order', 'App\Product');
    }
}
