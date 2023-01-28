<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

//    protected $fillable = [
//        'body', 'post_id'
//    ];
//
//    public function tiding(){
//        return $this->belongsTo(Tiding::class);
//    }

    protected $table = 'comments';
    protected $fillable = [
      'tiding_id',
      'user_id',
        'body'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
