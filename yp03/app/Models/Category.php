<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['body'];

    public function postes(){
        return $this->belongsTo(Post::class, 'category_id');
    }

//    public function posts(){
//        return $this->hasMany('App\Models\Post', 'category_id', 'id');
//    }

//    public function posts(){
//        return $this->hasMany(Post::class);
//    }

}
