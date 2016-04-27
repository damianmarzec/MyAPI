<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'alive', 'latitude', 'longitude'
    ];

    /**
     * User that give current item.
     * @return \App\User
     */
    public function giver()
    {
        return $this->belongsTo(User::class, 'giver_id');
    }

    /**
     * User that take current item.
     * @return \App\User
     */
    public function taker()
    {
        return $this->belongsTo(User::class, 'taker_id');
    }
}
