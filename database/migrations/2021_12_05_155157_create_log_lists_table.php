<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('license_no');
            $table->string('region_id');
            $table->string('district_id');
            $table->string('land_status');
            $table->string('reduced_impact_logging');
            $table->string('market');
            $table->string('place_of_scalling');
            $table->string('license_account_no');
            $table->string('date_scaled');
            $table->string('name_of_scaler');
            $table->string('registered_property_hammer_mark');
            $table->string('owner_of_property_hammer_mark');
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
        Schema::dropIfExists('log_lists');
    }
}
