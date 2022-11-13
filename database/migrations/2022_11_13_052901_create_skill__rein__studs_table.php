<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_rein_studs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_skill');
            $table->foreign('id_skill')->references('id_skill')->on('skills')->onDelete('CASCADE');

            $table->unsignedBigInteger('id_rein');
            $table->foreign('id_rein')->references('id_rein')->on('reinforcements')->onDelete('CASCADE');

            $table->unsignedBigInteger('id_stud');
            $table->foreign('id_stud')->references('id_stud')->on('students')->onDelete('CASCADE');

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
        Schema::dropIfExists('skill_rein_studs');
    }
};
