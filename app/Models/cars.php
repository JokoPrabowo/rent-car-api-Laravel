<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    public function deals() {
        return $this->hasMany(Deals::class);
    }
}
