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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedinteger('thread_updated_by');
            $table->timestamp('thread_updated_at');
            $table->string('title')->nullable(false);
            $table->unsignedinteger('author_id')->nullable(false);
            $table->unsignedinteger('parent_post');
            $table->unsignedinteger('parent_forum');
            $table->boolean('locked')->default(false)->nullable(false);
            $table->unsignedinteger('stickied')->default(false)->nullable(false);
            $table->text('post_text')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
