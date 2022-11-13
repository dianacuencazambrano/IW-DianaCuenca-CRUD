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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id('id_class');

            $table->unsignedBigInteger('id_status')->default(1);
            $table->foreign('id_status')->references('id_status')->on('status')->onDelete('CASCADE');

            $table->char('identifier_class',3);
            $table->string('level_class');
            $table->text('description_class')->nullable();
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
        Schema::dropIfExists('classrooms');
    }
};
