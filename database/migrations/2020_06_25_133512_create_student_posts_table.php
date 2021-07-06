<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('student_posts')){
        Schema::create('student_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name');
            $table->unsignedInteger('user_id');
            $table->mediumText('content');
            $table->string('slug',200)->unique();
            $table->string('city');
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
        Schema::dropIfExists('student_posts');
    }
}
