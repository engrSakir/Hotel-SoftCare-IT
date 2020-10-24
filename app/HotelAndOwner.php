<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelAndOwner extends Model
{
    //

    //user
    public function user(){
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    //hotel
    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }
}
