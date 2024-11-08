<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $type = "int";
    public $timestamps = true;
    public $incrementing = true;

    public function Cars(): HasMany {
        return $this->hasMany(Cars::class, "renter_id", "id");
    }

    public function Deals(): Hasmany {
        return $this->hasMany(Deals::class, "customer_id", "id");
    }
}
