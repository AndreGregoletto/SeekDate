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
        Schema::create('combines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_first_id')->constrained('users', 'id');
            $table->boolean('user_first_active')->nullable()->default(0);
            $table->foreignId('user_secound_id')->constrained('users', 'id');
            $table->boolean('user_secound_active')->nullable()->default(0);
            $table->boolean('active')->nullable()->default(0);
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
        Schema::dropIfExists('combines');
    }
};
