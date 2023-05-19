<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('born')->nullable();
            $table->string('movie')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('actors');
    }
};
