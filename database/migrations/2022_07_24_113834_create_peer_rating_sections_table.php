<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeerRatingSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peer_rating_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('employee_id_supervisor')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
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
        Schema::dropIfExists('peer_rating_sections');
    }
}
