<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateLaravellikecommentLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laravellikecomment_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('item_id'); // ModelName_modelId
            $table->smallInteger('vote');
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
        Schema::drop('laravellikecomment_likes');
    }
}
