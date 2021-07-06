<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('school_reviews')){
        Schema::create('school_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('school_reviews');
    }
}
