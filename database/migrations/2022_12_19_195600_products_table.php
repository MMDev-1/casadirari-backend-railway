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
            $table->id();
            $table->string('name');
            $table->tinyInteger('type')->default(1);
            $table->bigInteger('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->tinyInteger('seller_id')->nullable(false);
            $table->tinyInteger('attribute_set_id')->nullable(true);
            $table->integer('sku')->unique()->nullable(false);
            $table->float('price')->nullable(false);
            $table->float('sale_price')->nullable(true)->default(0);
            $table->integer('quantity')->nullable(false);
            $table->integer('salable_quantity')->nullable(false);
            $table->tinyInteger('status')->default(1);
            $table->string('image')->default("empty.png");
            $table->string('manafacturer')->nullable(false);
            $table->string('color')->nullable(true)->default(null);
            $table->string('size')->nullable(true)->default(null);
            $table->tinyInteger('step_size')->default(1);
            $table->tinyInteger('minimum_order_qty')->default(1);
            $table->tinyInteger('maximum_order_qty')->default(1);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_returnable')->default(false);
            $table->boolean('is_cancelable')->default(false);
            $table->boolean('is_deliverable')->default(false);
            $table->string('cancelable_period')->nullable(true);
            $table->integer('warranty_period')->nullable(true);
            $table->integer('guarante_period')->nullable(true);
            $table->float('rating')->default(0.0);
            $table->integer('number_of_ratings')->default(0);
            $table->text('short_description');
            $table->integer('row_order')->nullable(true)->default(null);
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
