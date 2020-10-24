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
            $table->string('name')->default('Hotel Name');
            $table->string('email')->default('info@website.com');
            $table->string('phone')->default('01304 *** ***');
            $table->string('address')->default('Company address');

            $table->string('logo')->default('logo.png');
            $table->string('fav')->default('default.png');

            $table->string('slogan')->default('Best hotel booking place');

            $table->string('meta_description')->default('Best hotel booking place');
            $table->string('meta_author')->default('Hotel');

            $table->integer('reset_sms_count')->default(3)->comment('Per day available reset message');
            $table->string('reset_sms_template')->default('আপনার নতুন পাসওয়ার্ডঃ ')->comment('Password sms template');
            $table->string('welcome_sms_template')->default('স্বাগতম')->comment('Welcome sms template');

            $table->text('footer_left')->nullable();
            $table->text('subscribe_note')->nullable();
            $table->text('contact_note')->nullable();
            $table->text('about')->nullable();
            $table->text('terms_and_condition')->nullable();
            $table->text('privacy_policy')->nullable();

            $table->boolean('advance_ownership')->default(0);
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
