<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeerRatingSectionPeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peer_rating_section_peers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('employee_id');
            $table->integer('criteria_0');
            $table->integer('criteria_1');
            $table->integer('criteria_2');
            $table->integer('criteria_3');
            $table->integer('index');
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
        Schema::dropIfExists('peer_rating_section_peers');
    }
}
