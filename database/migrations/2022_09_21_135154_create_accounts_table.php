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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('account_id');
            $table->string('email')-> unique();
            $table->string('password');
            $table->string('fullname');
            $table->integer('role')->nullable(); 
            $table->integer('active')->nullable(); 
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
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
        Schema::dropIfExists('accounts');
    }
};
