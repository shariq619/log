<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdpLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdp_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tdp_list_id');
            $table->string('serial_no');
            $table->string('log_no');
            $table->string('species');
            $table->string('length');
            $table->string('diameter_1');
            $table->string('diameter_2');
            $table->string('diameter_mean');
            $table->string('symbol');
            $table->string('defect_length');
            $table->string('defect_diameter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tdp_logs');
    }
}
