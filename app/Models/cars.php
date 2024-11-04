<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'renter_id',
        'brand',
        'model',
        'color',
        'year',
        'rental_price_per_day',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function deals() {
        return $this->hasMany(Deals::class);
    }
}
