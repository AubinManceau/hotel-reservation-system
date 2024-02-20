<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_reservation',
        'client_lastname',
        'client_firstname',
        'client_email',
        'client_phone',
        'hotel_id',
        'room_id',
        'date_start',
        'date_end'
    ];
}