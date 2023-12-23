<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->id();
            $table->string('type',50);
            $table->json('title',255);
            $table->json('text')->nullable();
            $table->json('full_text')->nullable();
            $table->string('image',512)->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('static_pages');
    }
}
