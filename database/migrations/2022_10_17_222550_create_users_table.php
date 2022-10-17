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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nick_name');
            $table->char('cell')->unique();
            $table->char('year');
            $table->string('photo')->nullable();
            $table->string('description');
            $table->string('job');
            $table->string('livin_in');
            $table->foreignId('gender_id')->constrained('genders', 'id');
            $table->foreignId('sexual_orientation_id')->constrained('sexual_orietations', 'id');
            $table->foreignId('smoking_id')->constrained('smokings', 'id');
            $table->foreignId('filter_id')->constrained('filters', 'id');
            $table->boolean('admin')->default(0);
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
};
