<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;



use Illuminate\Database\Eloquent\Model;


class Tiding extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'paragraph_id',
        'picture',
        'slug',

    ];

    protected $dates =['deleted_at'];

    public function getPicturedAttribute($picture){
        return asset($picture);
    }

    public  function replies(){
        return $this->hasMany('App\Models\News', 'parent_id');
    }

    public  function scopeNotReply($query){
        return $query->whereNull('parent_id');
    }

    public function paragraph(){
        return $this->belongsTo('App\Paragraph');
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
