<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelFacility extends Model
{
    use HasFactory;
    
    protected $table = 'fasilitas_hotel';
    protected $guarded = ['id'];
}
