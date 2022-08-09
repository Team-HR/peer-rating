<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmsRatingScaleMatrixSuccessIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pms_rating_scale_matrix_success_indicators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pms_rating_scale_matrix_id");
            $table->integer("index")->default(0);
            $table->string("success_indicator");
            $table->json("quality")->nullable();
            $table->json("efficiency")->nullable();
            $table->json("timeliness")->nullable();
            $table->json("in_charges")->nullable();
            $table->json("corrections")->nullable();
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
        Schema::dropIfExists('pms_rating_scale_matrix_success_indicators');
    }
}
