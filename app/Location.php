<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    protected $fillable = [
        'name',
        'status',
    ];

    //hotels
    public function hotels(){
        return $this->hasMany(Hotel::class, 'location_id', 'id');
    }
}
