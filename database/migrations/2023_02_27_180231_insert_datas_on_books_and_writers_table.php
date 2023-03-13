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
        // DB::table('writers')->insert([
        //     ['writer_name' => 'Rick Riordan'],
        //     ['writer_name' => 'J. K. Rowling'],
        //     ['writer_name' => 'John Green']
        // ]);

        // DB::table('books')->insert([
        //     ['book_name' => 'Percy Jackson e o Ladrão de Raios', 
        //     'genre' => 'Acao e aventura, Mitologia grega, Fantasia', 
        //     'writer_id' => '1', 'status' => 'rentable' ,
        //     'book_cover' => 'pjlraios.jpg',
        //     'synopsis' => 'A vida do adolescente Percy Jackson, que está sempre pronto para entrar em uma confusão, torna-se bem mais complicada quando ele descobre que é filho do deus grego Poseidon. Em um campo de treinamento para filhos das divindades, Percy aprende a tirar proveito de seus poderes divinos e se preparea para a maior aventura de sua vida.'],
            
        //     ['book_name' => 'Percy Jackson o Mar de Monstros', 
        //     'genre' => 'Acao e aventura, Mitologia grega, Fantasia', 
        //     'writer_id' => '1', 'status' => 'rentable' , 
        //     'book_cover' => 'pjmmonstros.jpg',
        //     'synopsis' => 'Para salvar o mundo, Percy e seus amigos precisam encontrar o poderoso e mágico Velocino de Ouro. Para isso, eles embarcam em uma perigosa odisseia nas águas nunca navegadas do Mar dos Monstros - conhecido pelos humanos como Triângulo das Bermudas.'],
            
        //     ['book_name' => 'Percy Jackson a Maldição do Tita', 
        //     'genre' => 'Acao e aventura, Mitologia grega, Fantasia', 
        //     'writer_id' => '1', 'status' => 'rentable' , 
        //     'book_cover' => 'pjmtita.jpg',
        //     'synopsis' => 'Um monstro ancestral foi despertado - um ser com poder suficiente para destruir o Olimpo -, e Ártemis, a única deusa capaz de encontrá-lo, desapareceu. Percy e seus amigos têm apenas uma semana para resgatar a deusa sequestrada e solucionar o mistério que ronda o monstro que ela caçava.'],
            
        //     ['book_name' => 'A Culpa é das Estrelas', 
        //     'genre' => 'Romance, Drama', 
        //     'writer_id' => '3', 'status' => 'rentable' , 
        //     'book_cover' => 'acedestrelas.jpg',
        //     'synopsis' => 'O livro segue a história de dois adolescentes com câncer que se apaixonam. É um dos livros mais conhecidos de John Green e foi adaptado para um filme de sucesso em 2014.'],

        //     ['book_name' => 'Cidades de Papel', 
        //     'genre' => 'Romance, Misterio', 
        //     'writer_id' => '3', 'status' => 'rentable' , 
        //     'book_cover' => 'cdpapel.jpg',
        //     'synopsis' => ' O livro segue a história de um jovem que se apaixona por sua vizinha misteriosa, que desaparece subitamente. Ele se junta a seus amigos para tentar encontrá-la.'],

        //     ['book_name' => 'O Teorema Katherine', 
        //     'genre' => 'Romance, Ficcao juvenil', 
        //     'writer_id' => '3', 'status' => 'rentable' , 
        //     'book_cover' => 'tkatherine.jpg',
        //     'synopsis' => ' O livro segue a história de um jovem prodígio que tenta encontrar um padrão nos seus relacionamentos com mulheres chamadas Katherine, após ser abandonado pela sua última namorada.'],

        //     ['book_name' => 'Harry Potter e a Pedra Filosofal', 
        //     'genre' => 'Acao e aventura, Mundo magico, Fantasia', 
        //     'writer_id' => '2', 'status' => 'rentable' , 
        //     'book_cover' => 'hppfilosofal.jpg',
        //     'synopsis' => 'Inicialmente, os garotos acreditavam que a Pedra Filosofal, que se encontrava protegida em Hogwarts, fosse alvo de Severo Snape, professor da escola, para que este se tornasse rico. Mas os garotos descobrem que Voldemort, enfraquecido, está à procura da Pedra para se tornar um grande bruxo novamente.'],
            
        //     ['book_name' => 'Harry Potter e a Camara Secreta', 
        //     'genre' => 'Acao e aventura, Mundo magico, Fantasia', 
        //     'writer_id' => '2', 'status' => 'rentable' , 
        //     'book_cover' => 'hpcsecreta.jpg',
        //     'synopsis' => 'Nesse livro a Câmara Secreta é aberta, e o mal começa a assolar Hogwarts, alunos começam a ser petrificados e a escola pode ser fechada. Só Harry, Rony e Hermione podem impedir isso. Só Harry, Rony e Hermione podem desvendar o mistério e restaurar a paz a escola.'],
            
        //     ['book_name' => 'Harry Potter e o Prisioneiro de Azkaban', 
        //     'genre' => 'Acao e aventura, Mundo magico, Fantasia', 
        //     'writer_id' => '2', 'status' => 'rentable' , 
        //     'book_cover' => 'hppazkaban.jpg',
        //     'synopsis' => 'Após ser acusado de ter entregue os Potter a Voldemort e matado treze trouxas e seu ex-amigo, Black é condenado a prisão perpétua, sendo aprisionado na prisão de Azkaban. Após treze anos, ele foge da prisão para, como todos acreditavam, matar Harry em nome de Voldemort.']
            
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
