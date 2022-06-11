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
            $table->integerIncrements('id'); // max 4_294_967_295
            $table->unsignedTinyInteger('role_id')->default(1);
            $table->string('login')->unique(); // TO DO длинну от 3 до 255
            $table->string('password'); // TO DO длинну от 3 до 255

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

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
