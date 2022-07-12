<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_jawabans', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('url',300);
            $table->integer('size')->nullable();
            $table->foreignId('jawaban_id')->nullable()->constrained('jawabans');

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
        Schema::dropIfExists('gambar_jawabans');
    }
}
