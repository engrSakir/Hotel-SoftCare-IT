<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //Writer
    public function writer(){
        return $this->belongsTo(User::class,'writer_id','id');
    }
}
