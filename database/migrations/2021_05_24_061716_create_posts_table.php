<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('subtitle')->nullable()->comment('subtitle of title post');
            $table->longText('description')->nullable()->comment('description of post');
            $table->text('content_raw');
            $table->text('content_html');
            $table->string('type');
            $table->boolean('is_sticky')->default(false);

            $table->integer('order_column')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('layout')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
