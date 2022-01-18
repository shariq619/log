<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_rates', function (Blueprint $table) {
            $table->id();
            $table->string('markete');
            $table->string('class');
            $table->unsignedBigInteger('species_id');
            $table->unsignedBigInteger('land_status_id');
            $table->unsignedBigInteger('log_size_id');
            $table->string('method');
            $table->string('price');
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
        Schema::dropIfExists('log_rates');
    }
}
