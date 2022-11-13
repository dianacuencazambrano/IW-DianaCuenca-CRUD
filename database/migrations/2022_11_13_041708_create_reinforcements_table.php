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
        Schema::create('reinforcements', function (Blueprint $table) {
            $table->id('id_rein');

            $table->unsignedBigInteger('id_status')->default(1);
            $table->foreign('id_status')->references('id_status')->on('status')->onDelete('CASCADE');

            $table->string('title_rein');
            $table->text('description_rein')->nullable();
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
        Schema::dropIfExists('reinforcements');
    }
};
