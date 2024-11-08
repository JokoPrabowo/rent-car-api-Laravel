<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deals extends Model
{
    protected $fillable = [
        'renter_id',
        'car_id',
        'customer_id',
        'rental_time_by_day',
        'total_rental_price',
    ];

    protected $primaryKey = "id";
    protected $keyType = "int";
    protected $table = "deals";
    public $incrementing = true;
    public $timestamps = true;

    public function user(): BelongsTo {
        return $this->belongsTo(Users::class, "customer_id", "id");
    }
    public function car(): BelongsTo {
        return $this->belongsTo(Cars::class, "car_id", "id");
    }
}
