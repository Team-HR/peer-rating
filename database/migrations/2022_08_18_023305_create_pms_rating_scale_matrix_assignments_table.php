<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmsRatingScaleMatrixAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pms_rating_scale_matrix_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("period_id");
            $table->unsignedBigInteger("pms_rating_scale_matrix_success_indicator_id");
            $table->unsignedBigInteger("sys_employee_id");
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
        Schema::dropIfExists('pms_rating_scale_matrix_assignments');
    }
}
