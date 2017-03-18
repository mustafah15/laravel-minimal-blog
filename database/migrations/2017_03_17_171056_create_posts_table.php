<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts',function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->text('content');
            $table->timestamps();
            $table->string('title');
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('category_id')->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts',function (Blueprint $table){
            $table->dropForeign('posts_user_id_foreign');
            $table->dropForeign('posts_category_id_foreign');
        });

        Schema::dropIfExists('posts');

    }
}
