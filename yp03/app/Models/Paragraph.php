<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tiding;

class Paragraph extends Model
{
    use HasFactory;

    public function tidings(){
        return $this->hasMany('App\Models\Tiding', 'paragraph_id');
    }
}
