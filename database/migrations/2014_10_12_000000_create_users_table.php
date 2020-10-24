<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1)->comment('1-Active|0-Inactive');
            $table->string('name');
            $table->string('phone')->unique();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->string('email')->unique()->nullable();
            $table->string('image')->default('default.png');
            $table->string('gender')->nullable()->comment('male|female');
            $table->string('address')->nullable();
            $table->string('nid')->nullable();
            $table->string('last_reset_at')->nullable()->comment('Password reset code sending date');
            $table->integer('reset_count')->nullable()->comment('In a day how many time reset message available');
            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('last_logout_at')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('website')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
