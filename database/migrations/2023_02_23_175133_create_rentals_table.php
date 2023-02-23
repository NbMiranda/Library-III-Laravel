<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->dateTime('alugado_em');
            $table->dateTime('expira_em');
            // book foreign
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            // user foreign
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('rentals', function (Blueprint $table) { 
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->dropForeign(['book_id']);
            $table->dropColumn('book_id');

        });
        Schema::dropIfExists('rentals');
    }
};
