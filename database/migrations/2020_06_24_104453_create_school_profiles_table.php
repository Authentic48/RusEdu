<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('school_profiles')){
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedInteger('user_id');
            $table->string('slug')->unique();
            $table->string('location');
            $table->string('subject');
            $table->string('experience');
            $table->string('phone');
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
            $table->string('skype')->nullable();
            $table->string('vk')->nullable();
            $table->string('onlineTraining');
            $table->longText('about');
            $table->string('from');
            $table->string('to');
            $table->string('address');
            $table->string('work_day');
            $table->decimal('price');
            $table->string('pic');
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
        Schema::dropIfExists('school_profiles');
    }
}

