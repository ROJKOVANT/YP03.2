<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['body'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }


    public  function replies(){
        return $this->hasMany('App\Models\News', 'parent_id');
    }

    public  function scopeNotReply($query){
        return $query->whereNull('parent_id');
    }
}
