<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVoteColumnIntoJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawabans',function(Blueprint $table){
            $table->integer('vote')->nullable();
            $table->text('quill_delta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jawabans', function(Blueprint $table){
            $table->dropColumn('vote');
            $table->dropColumn('quill_delta');
        });
    }
}
