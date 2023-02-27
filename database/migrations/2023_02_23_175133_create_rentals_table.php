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
            $table->dateTime('rented_in')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('expires_in');
            $table->dateTime('return_in')->nullable();
            // book foreign
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade'); ;
            // user foreign
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); ;
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
