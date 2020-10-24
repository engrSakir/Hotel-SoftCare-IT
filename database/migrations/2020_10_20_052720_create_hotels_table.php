<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable()->comment('0-Rejected|1-Approved');
            $table->string('logo')->nullable();
            $table->string('name');
            $table->foreignId('location_id')->comment('System Location');
            $table->string('address')->nullable()->comment('Specifically hotel location');
            $table->string('phone')->nullable();
            $table->string('refer_by')->nullable();
            $table->text('manager')->nullable();
            $table->text('description')->nullable();
            $table->string('trade_license')->nullable();
            $table->integer('visitor')->default(0);
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('hotels');
    }
}
