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
        Schema::create('mobile_sections', function (Blueprint $table) {
            $table->id();
            $table->string('mobile_title')->nullable();
            $table->string('mobile_content')->nullable();
            $table->string('mobile_android')->nullable();
            $table->string('mobile_ios')->nullable();
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
