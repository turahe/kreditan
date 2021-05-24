<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->index()->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('description')->nullable();
            $table->string('domain')->nullable()->unique();
            $table->string('subdomain')->nullable()->unique();
            $table->timestamp('registered_at')->nullable();
            $table->enum('type', ['vendor', 'creditor'])->default('vendor')->comment('type of vendor is merchant or creditor');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('vendors');
    }
}
