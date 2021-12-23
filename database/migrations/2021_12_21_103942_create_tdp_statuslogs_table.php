<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdpStatuslogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdp_status_logs', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('reason')->default(null);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('assignto_id')->default(null);
            $table->unsignedBigInteger('tdp_list_id');
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
        Schema::dropIfExists('tdp_status_logs');
    }
}
