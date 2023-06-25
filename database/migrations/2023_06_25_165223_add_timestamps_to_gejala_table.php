<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToGejalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('gejala', function (Blueprint $table) {
        $table->string('solusi')->default('');
        $table->timestamps();
    });
}

public function down()
{
    Schema::table('gejala', function (Blueprint $table) {
        $table->dropTimestamps();
    });
}

}
