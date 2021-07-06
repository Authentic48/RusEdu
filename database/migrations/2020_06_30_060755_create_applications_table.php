<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('applications')){
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->integer('job_id')->unsigned();
            $table->string('name');
            $table->string('school_name');
            $table->string('job_title');
            $table->string('email');
            $table->string('resume');
            $table->string('comments')->nullable();
            $table->enum('status', array('получили', 'в ожидании','конное интервью','не сохраняется'));
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
        Schema::dropIfExists('applications');
    }
}
