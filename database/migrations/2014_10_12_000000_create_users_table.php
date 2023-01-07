<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('google_id')->unique();
            $table->string('nickname')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->text('google_token')->nullable();
            $table->text('google_refresh_token')->nullable();
            $table->integer('google_expires_in')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->index('created_at');
            $table->index('updated_at');
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
};
