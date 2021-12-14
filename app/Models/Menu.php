<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Menu extends Model 
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'notes', 'price', 'restaurant_id'
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'restaurant_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'restaurant_id', 'id');
    }

}
