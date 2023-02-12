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
        Schema::create('escorts', function (Blueprint $table) {
            $table->id();
            $table->integer('lang_fr')->nullable();
            $table->integer('lang_fr_maitrise')->nullable();
            $table->integer('lang_en')->nullable();
            $table->integer('lang_en_maitrise')->nullable();
            $table->integer('lang_es')->nullable();
            $table->integer('lang_es_maitrise')->nullable();
            $table->integer('lang_de')->nullable();
            $table->integer('lang_de_maitrise')->nullable();
            $table->integer('height');
            $table->integer('weight');
            $table->integer('age');
            $table->string('eyes');
            $table->string('origin');
            $table->string('country');
            $table->string('location');
            $table->string('breasts');
            $table->string('services')->nullable();
            $table->string('tr_30M')->nullable();
            $table->string('tr_1H')->nullable();
            $table->string('tr_1N')->nullable();
            $table->string('tr_1W')->nullable();
            $table->string('mobility')->nullable();
            $table->string('biography');
            $table->string('about',5000)->nullable();
            $table->string('hair');
            $table->string('pubic_hair');
            $table->string('contact');
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('escorts');
    }
};
