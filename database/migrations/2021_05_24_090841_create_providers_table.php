<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tm_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('service', ['SHIPPING CHARGES','SMS GATEWAY','ONLINE PAYMENT','MAILER','CDN','STORAGE','REGISTRAR','ATM NETWORK','PPOB','CLOUD','DNS','WEBSOCKET','VIDEO HOSTING','TELCO']);
            $table->string('logo')->nullable();
            $table->string('description')->nullable();
            $table->string('homepage')->nullable();
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
        Schema::dropIfExists('tm_providers');
    }
}
