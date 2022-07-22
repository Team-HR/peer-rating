<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeerRatingOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peer_rating_offices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peer_rating_department_id');
            $table->unsignedBigInteger('office_id')->nullable();
            $table->string('name');
            $table->boolean('is_complete')->nullable();
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
        Schema::dropIfExists('peer_rating_offices');
    }
}
