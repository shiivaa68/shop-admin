<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'brand', 'body','discount','price','image','cat','status','count','user_id'
    ];
    public function category(){
        return $this->belongsToMany(Category::class);
    }

    public function basket()
    {
        return $this->hasMany(Basket::class);
    }

}
