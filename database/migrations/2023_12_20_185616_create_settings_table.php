<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('text')->nullable();
            $table->string('icon',255)->nullable();
            $table->string('logo',512)->nullable();
            $table->string('instagram',255)->nullable();
            $table->string('facebook',255)->nullable();
            $table->string('telegram',255)->nullable();
            $table->string('youtube',255)->nullable();
            $table->string('twitter',255)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
