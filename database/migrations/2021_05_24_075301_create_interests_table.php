<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('category_id');
            $table->decimal('interest');
            $table->decimal('down_payment');
            $table->decimal('tenor');
            $table->timestamps();
        });

        Schema::table('interests', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->foreign('vendor_id')
                ->references('id')
                ->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interests');
    }
}
