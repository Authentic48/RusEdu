<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('programs')){
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('user_id');
            $table->string('image')->nullable();
            $table->string('price');
            $table->string('level');
            $table->string('category');
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
