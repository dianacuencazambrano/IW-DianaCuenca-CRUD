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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id('id_qual');

            $table->unsignedBigInteger('id_status')->default(1);
            $table->foreign('id_status')->references('id_status')->on('status')->onDelete('CASCADE');

            $table->char('scale_qual',3);
            $table->string('meaning_qual');
            $table->text('description_qual');

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
        Schema::dropIfExists('qualifications');
    }
};
