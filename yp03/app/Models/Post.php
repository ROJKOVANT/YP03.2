<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'post_image'];


    public function categoryPost(){
        return $this->hasMany(Category::class);
    }

    public function category(){
        return $this->hasMany(Category::class, 'category_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
//    public function category(){
//        return $this->belongsTo('App\Models\Category', 'body');
//    }
}
