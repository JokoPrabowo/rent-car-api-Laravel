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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->integer("rental_time_by_day")->nullable(false);
            $table->integer("total_rental_price")->nullable(false);
            $table->unsignedBigInteger("car_id")->nullable(false);
            $table->unsignedBigInteger("customer_id")->nullable(false);
            $table->timestamps();

            $table->foreign("car_id")->on("cars")->references("id");
            $table->foreign("customer_id")->on("users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
