<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'image',
    ];

    //services
    public function services(){
        return $this->hasMany(Service::class, 'category_id', 'id');
    }

}
