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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');

            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('CASCADE');

            $table->unsignedBigInteger('id_status')->default(1);
            $table->foreign('id_status')->references('id_status')->on('status')->onDelete('CASCADE');

            $table->string('name');
            $table->string('lastname');
            $table->date('birthday');
            $table->string('identification', 10);
            $table->string('phoneNumber', 10);
            $table->text('homeAddress');
            $table->string('email')->unique();
            $table->string('password');

            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
