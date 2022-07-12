<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarPertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('url',300);
            $table->integer('size')->nullable();
            $table->foreignId('pertanyaan_id')->nullable()->constrained('pertanyaans');
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
        Schema::dropIfExists('gambar_pertanyaans');
    }
}
