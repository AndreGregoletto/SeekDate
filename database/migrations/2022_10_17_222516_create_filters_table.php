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
        Schema::create('filters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sexual_orientation_id')->constrained('sexual_orietations', 'id');
            $table->foreignId('gender_id')->constrained('genders', 'id');
            $table->foreignId('smoking_id')->constrained('smokings', 'id');
            $table->char('year_min');
            $table->char('year_max');
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
        Schema::dropIfExists('filters');
    }
};
