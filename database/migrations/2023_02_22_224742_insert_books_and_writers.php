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
        // Insert datas on writers
        // DB::table('usuarios')->insert([
        //     'book_name' => 'Pearcy Jackson e o Ladrão de Raios',
        //     'genre' => 'joao@email.com',
        //     'senha' => bcrypt('senha123')
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
