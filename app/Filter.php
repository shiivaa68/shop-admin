<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = [
        'cat_id', 'name', 'en_name','parent_id','type',
    ];

}

