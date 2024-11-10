<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("brand")->nullable(false);
            $table->string("model")->nullable(false);
            $table->string("color")->nullable(false);
            $table->integer("year")->nullable(false);
            $table->integer("rental_price_per_day")->nullable(false);
            $table->unsignedBigInteger("renter_id")->nullable(false);
            $table->timestamps();

            $table->foreign("renter_id")->on("users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
