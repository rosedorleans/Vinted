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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->foreign("category_id")->references("id")->on("categories");
            $table->unsignedBigInteger("category_id");
            $table->string("description");
            $table->decimal("price");
            $table->string("address");
            $table->foreign("city_id")->references("id")->on("cities");
            $table->unsignedBigInteger("city_id");
            $table->string("photos");
            $table->foreign("condition_id")->references("id")->on("conditions");
            $table->unsignedBigInteger("condition_id");
            $table->string("brand");
            $table->string("model");
            $table->integer("year");
            $table->string("size");
            $table->dateTime("published_at");
            $table->dateTime("expired_at");
            $table->foreign("delivery_id")->references("id")->on("deliveries");
            $table->unsignedBigInteger("delivery_id");
            $table->string("warranty");
            $table->boolean("is_exchangeable");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
