<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecoundCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secound_comments', function (Blueprint $table) {
            $table->id();

            $table->string('comment');
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('commentId')->unsigned();

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('commentId')->references('id')->on('comments');

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
        Schema::dropIfExists('secound_comments');
    }
}
