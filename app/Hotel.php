<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'status',
        'logo',
        'name',
        'location_id',
        'location',
        'phone',
        'refer_by',
        'manager',
        'description',
        'trade_license',
        'visitor',
        'facebook',
        'instagram',
        'twitter',
        'google',
        'youtube',
        'linkedin',
        'whatsapp',
        'website',
    ];

    //location
    public function location(){
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }


    //owners
    public function owners(){
        return $this->hasMany(HotelAndOwner::class, 'hotel_id', 'id');
    }

    //bookings
    public function bookings(){
        return $this->hasMany(Booking::class, 'hotel_id', 'id');
    }

    //images
    public function images(){
        return $this->hasMany(Image::class, 'hotel_id', 'id');
    }

    //packages
    public function packages(){
        return $this->hasMany(Package::class, 'hotel_id', 'id');
    }
}
