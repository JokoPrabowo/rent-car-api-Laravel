<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cars extends Model
{
    protected $fillable = [
        'renter_id',
        'brand',
        'model',
        'color',
        'year',
        'rental_price_per_day',
    ];

    protected $primaryKey = "id";
    protected $keyType = "int";
    protected $table = "cars";
    public $incrementing = true;
    public $timestamps = true;

    public function user(): BelongsTo {
        return $this->belongsTo(Users::class, "renter_id", "id");
    }

    public function deals() {
        return $this->hasMany(Deals::class, "car_id", "id");
    }
}
