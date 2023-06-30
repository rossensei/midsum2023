<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['last_name','first_name','address','phone','bdate','bio', 'profile_pic'];

    protected $casts = [
        'bdate' =>'date'
    ];

    protected $appends = ['formattedBDate','bdate2', 'profile_pic_url'];

    public function getFormattedBDateAttribute() {
        return $this->bdate->format('F d, Y');
    }

    public function getBdate2Attribute() {
        return $this->bdate->format('Y-m-d');
    }

    public function getProfilePicUrlAttribute() {
        $url = $this->profile_pic ? asset($this->profile_pic) : "";
        return $url;
    }
}
