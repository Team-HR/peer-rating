<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOnPeerRatingOfficePeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peer_rating_office_peers', function (Blueprint $table) {
            $table->integer('index')->after('employee_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peer_rating_office_peers', function (Blueprint $table) {
            $table->dropColumn('index');
        });
    }
}
