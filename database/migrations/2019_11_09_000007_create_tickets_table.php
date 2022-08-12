<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('content')->nullable();
            $table->unsignedInteger('categorie_id')->index()->references('id')->on('categories')->nullable();
            $table->unsignedInteger('author_id')->index()->references('id')->on('users')->nullable();
            $table->unsignedInteger('site_id')->index()->references('id')->on('sites')->nullable();
            $table->float('duration')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
