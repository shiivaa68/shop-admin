<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $fillable = ['name' , 'title'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
