<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking', 5)->unique();
            $table->string('nama', 255);
            $table->string('email', 255);
            $table->string('telepon', 255);
            $table->string('merk', 255);
            $table->string('type', 255);
            $table->date('tanggal');
            $table->time('waktu');
            $table->text('keluhan');
            $table->boolean('status_service')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
