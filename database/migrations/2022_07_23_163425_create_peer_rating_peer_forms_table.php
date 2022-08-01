<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeerRatingPeerFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peer_rating_peer_forms', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('office_id');
            // $table->unsignedBigInteger('employee_id');
            // $table->unsignedBigInteger('employee_id_rater');
            $table->unsignedBigInteger('peer_rating_office_peer_id');
            $table->unsignedBigInteger('peer_rating_office_peer_id_rater');
            $table->integer('criteria_0')->nullable();
            $table->integer('criteria_1')->nullable();
            $table->integer('criteria_2')->nullable();
            $table->integer('criteria_3')->nullable();
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
        Schema::dropIfExists('peer_rating_peer_forms');
    }
}
