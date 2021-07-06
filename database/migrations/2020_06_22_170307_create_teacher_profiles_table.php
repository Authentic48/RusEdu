<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('teacher_profiles')){
        Schema::create('teacher_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedInteger('user_id');
            $table->string('location');
            $table->string('slug')->unique();
            $table->string('subject');
            $table->string('experience');
            $table->string('phone');
            $table->string('instagram')->nullable();
            $table->string('skype')->nullable();
            $table->string('vk')->nullable();
            $table->string('citizenship');
            $table->string('onlineTraining');
            $table->string('from');
            $table->string('to');
            $table->longText('about');
            $table->string('work_day');
            $table->decimal('wages');
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
        Schema::dropIfExists('teacher_profiles');
    }
}
