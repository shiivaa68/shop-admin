<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'title_fa','image',
    ];

    public static function search($data){
        $category=Category::orderBy('id','DESC');
        if(sizeof($data)>0){
            if(array_key_exists('title',$data) &&  array_key_exists('title',$data)){
                $category=$category->where('title','like','%'.$data['title'].'%')
                    ->where('title_fa','like','%'.$data['title_fa'].'%');
            }
        }
        $category=$category->paginate(10);
        return $category;

    }
    public function product(){
        return $this->hasMany(Product::class);
    }


}
