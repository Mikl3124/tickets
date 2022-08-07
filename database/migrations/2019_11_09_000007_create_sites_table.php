<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('url')->nullable();
          $table->string('type')->nullable();
          $table->json('medias')->nullable();
          $table->date('delivery_date')->nullable();
          $table->string('logo')->nullable();
          $table->unsignedInteger('contact_id')->index()->references('id')->on('users')->nullable();
          $table->longText('description')->nullable();
          $table->json('keywords')->nullable();
          $table->float('ticket_time')->nullable();
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
        Schema::dropIfExists('sites');
    }
}
