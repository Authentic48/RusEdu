<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('jobs')){
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('profession');
            $table->unsignedInteger('user_id');
            $table->date('deadline');
            $table->string('slug')->unique();
            $table->string('city');
            $table->mediumText('about');
            $table->mediumText('description');
            $table->mediumText('application');
            $table->mediumText('requirements');
            $table->string('salary');
            $table->string('photo');
            $table->string('name');
            $table->string('experience');
            $table->string('address');
            $table->string('email');
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
        Schema::dropIfExists('jobs');
    }
}
