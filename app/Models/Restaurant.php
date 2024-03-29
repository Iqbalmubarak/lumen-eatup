<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Restaurant extends Model 
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'type_id', 'rating', 'status'
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'restaurant_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'restaurant_id', 'id');
    }

    public function type()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

}
