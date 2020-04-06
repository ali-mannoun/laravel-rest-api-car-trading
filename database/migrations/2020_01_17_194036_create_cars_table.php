<?php

use App\Car;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            //1. General information
            $table->string('main_image_url');
            $table->string('brand');
            $table->string('model');
            $table->string('generation');
            $table->string('year_of_putting_into_production');
            $table->string('year_of_stopping_production');
            $table->string('description');
            //2. Internal combustion Engine:
            $table->string('power');
            $table->string('model_engine');
            $table->string('maximum_engine_speed');
            $table->string('engine_oil_capacity');
            $table->string('fuel_system');
            //3. Performance
            $table->string('max_speed');
            $table->string('acceleration_100km/h');
            $table->string('fuel_consumption');
            $table->string('co2_emissions');
            //4. Body type
            $table->string('seats');
            $table->string('doors');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('max_weight');
            $table->string('body_type');
            $table->string('fuel_tank_volume');
            //5. Others
            $table->string('brakes');
            $table->string('number_of_gears');
            $table->string('gear_type');
            $table->string('tire_size');
            $table->string('exterior_features');
            $table->string('interior_features');

            //$table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

