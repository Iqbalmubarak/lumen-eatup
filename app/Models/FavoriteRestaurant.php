<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FavoriteRestaurant extends Model 
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id', 'user_id'
    ];

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restaurant_id');
    }

}
