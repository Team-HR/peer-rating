<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeerRatingSectionHeadFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peer_rating_section_head_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peer_rating_section_head_id');
            $table->unsignedBigInteger('peer_rating_section_head_id_rater');
            $table->integer('criteria_0');
            $table->integer('criteria_1');
            $table->integer('criteria_2');
            $table->integer('criteria_3');
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
        Schema::dropIfExists('peer_rating_section_head_forms');
    }
}
