<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deals extends Model
{
    use HasFactory;

    protected $fillable = [
        'renter_id',
        'car_id',
        'customer_id',
        'rental_time_per_day',
        'total_rental_price',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function car() {
        return $this->belongsTo(Cars::class);
    }
}
