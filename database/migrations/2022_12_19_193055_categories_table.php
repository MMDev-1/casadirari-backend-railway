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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->nullable()->unsigned();
            $table->foreign('parent_id')->references('id')->on('categories');
            $table->string('name');
            $table->string('slug')->nullable()->unique();
            $table->string('image')->default("empty.png");
            $table->string('banner')->default("empty.png");
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_homepage')->default(0);
            $table->integer('row_order')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }

};
