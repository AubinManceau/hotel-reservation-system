<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description',
        'image',
        'nb_rooms',
        'price'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }
}
