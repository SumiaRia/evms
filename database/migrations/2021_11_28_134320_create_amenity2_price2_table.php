<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenity2Price2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenity2_price2', function (Blueprint $table) {
            $table->unsignedInteger('price2_id');

            $table->foreign('price2_id', 'price2_id_fk_384064')->references('id')->on('prices2')->onDelete('cascade');

            $table->unsignedInteger('amenity2_id');

            $table->foreign('amenity2_id', 'amenity2_id_fk_384064')->references('id')->on('amenities2')->onDelete('cascade');
        });
    }


}
