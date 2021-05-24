<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable()->comment('category products');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('product parents of product');
            $table->unsignedBigInteger('vendor_id')->comment('owner of product or shop name');
            $table->string('slug')->unique()->comment('automatic generate of slug base title');
            $table->string('title')->comment('name of product');
            $table->string('subtitle')->nullable()->comment('subtitle of title post');
            $table->longText('description')->nullable()->comment('description of post');
            $table->text('content_raw')->comment('content of product with style markdown');
            $table->text('content_html')->comment('content of product with style html');

            $table->integer('status')->nullable();
            $table->integer('order_column')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('type')->comment('type is enum, digital, physic, ebook');
            $table->string('layout')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('parent_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('vendor_id')
                ->references('id')
                ->on('vendors')
                ->onDelete('cascade');
        });

        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('choice')->nullable();
            $table->string('sku')->nullable();
            $table->string('condition')->nullable();
            $table->decimal('weight')->nullable();
            $table->string('barcode')->nullable();
            $table->string('stock')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->boolean('is_default')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('products');
    }
}
