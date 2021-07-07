<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('type');
            $table->integer('international');
            $table->string('email');
            $table->string('services');
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumn('type');
        Schema::dropColumn('international');
        Schema::dropColumn('email');
        Schema::dropColumn('services');
        Schema::dropColumn('active');
    }
}
