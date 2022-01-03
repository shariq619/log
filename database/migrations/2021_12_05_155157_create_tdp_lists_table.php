<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdpListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdp_lists', function (Blueprint $table) {
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
            $table->string('registered_property_hammer_mark')->nullable();
            $table->string('owner_of_property_hammer_mark')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('log_no')->nullable();
            $table->string('species')->nullable();
            $table->string('length')->nullable();
            $table->string('diameter_1')->nullable();
            $table->string('diameter_2')->nullable();
            $table->string('diameter_mean')->nullable();
            $table->string('symbol')->nullable();
            $table->string('defect_length')->nullable();
            $table->string('defect_diameter')->nullable();
            $table->string('fee')->default('0');
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
        Schema::dropIfExists('tdp_lists');
    }
}
