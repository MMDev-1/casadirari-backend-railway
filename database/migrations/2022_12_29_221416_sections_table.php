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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->json('category_id')->nullable();
            $table->json('products_ids')->nullable();
            $table->string('block_title');
            $table->tinyInteger('block_type')->default(1);
            $table->string('slug')->nullable()->unique();
            $table->tinyInteger('status')->default(1);
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
        //
    }
};
