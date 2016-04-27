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
        // 'name', 'email', 'password',
        'name', 'password', 'alive', 'latitude', 'longitude'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'token'
    ];


    /**
     * Returns all given items by curent user
     * @return \App\Item
     */
    public function itemsGiven()
    {
        return $this->hasMany(\App\Item::class, 'giver_id');
    }

    /**
     * Returns all taken items by curent user
     * @return \App\Item
     */
    public function itemsTaken()
    {
        return $this->hasMany(\App\Item::class, 'taker_id');
    }
}
