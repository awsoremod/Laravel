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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // max 18_446_744_073_709_551_615
            $table->unsignedSmallInteger('type_id');
            $table->unsignedMediumInteger('brand_id');
            $table->string('name')->unique();
            $table->unsignedFloat('price');

            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

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
        Schema::dropIfExists('products');
    }
};
