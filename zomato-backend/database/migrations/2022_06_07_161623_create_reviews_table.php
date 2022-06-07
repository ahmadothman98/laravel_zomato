<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('review');
            $table->boolean('confirmed')->default(0);
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('resto_id'); 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('resto_id')->references('id')->on('restos');
            $table->rememberToken();
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
        Schema::dropIfExists('reviews');
    }
}
