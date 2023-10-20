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
        Schema::table('ads', function (Blueprint $table) {
            $table->string('photos')->nullable()->change();
            $table->string('brand')->nullable()->change();
            $table->string('model')->nullable()->change();
            $table->integer('year')->nullable()->change();
            $table->string('size')->nullable()->change();
            $table->string('warranty')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ad', function (Blueprint $table) {
            $table->string('photos')->unsigned()->nullable(false)->change();
            $table->string('brand')->unsigned()->nullable(false)->change();
            $table->string('model')->unsigned()->nullable(false)->change();
            $table->integer('year')->unsigned()->nullable(false)->change();
            $table->string('size')->unsigned()->nullable(false)->change();
            $table->string('warranty')->unsigned()->nullable(false)->change();
        });
    }
};
