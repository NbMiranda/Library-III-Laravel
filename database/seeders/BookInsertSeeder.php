<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Writer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookInsertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // root user
        DB::table('users')->insert([
            'name' => 'Leader',
            'email' => 'root@root',
            'user_image' => 'redperson.png',
            'password' => bcrypt('rootroot')
        ]);
        

        // Insert on writers table
        Writer::create( ['writer_name' => 'Rick Riordan']);
        Writer::create( ['writer_name' => 'J. K. Rowling']);
        Writer::create( ['writer_name' => 'John Green']);


        Book::create(['book_name' => 'Percy Jackson e o Ladrão de Raios', 
            'genre' => 'Acao e aventura, Mitologia grega, Fantasia', 
            'writer_id' => '1', 'status' => 'rentable' ,
            'book_cover' => 'pjlraios.jpg',
            'synopsis' => 'A vida do adolescente Percy Jackson, que está sempre pronto para entrar em uma confusão, torna-se bem mais complicada quando ele descobre que é filho do deus grego Poseidon. Em um campo de treinamento para filhos das divindades, Percy aprende a tirar proveito de seus poderes divinos e se preparea para a maior aventura de sua vida.']);
            
        Book::create(['book_name' => 'Percy Jackson o Mar de Monstros', 
        'genre' => 'Acao e aventura, Mitologia grega, Fantasia', 
        'writer_id' => '1', 'status' => 'rentable' , 
        'book_cover' => 'pjmmonstros.jpg',
        'synopsis' => 'Para salvar o mundo, Percy e seus amigos precisam encontrar o poderoso e mágico Velocino de Ouro. Para isso, eles embarcam em uma perigosa odisseia nas águas nunca navegadas do Mar dos Monstros - conhecido pelos humanos como Triângulo das Bermudas.']);
            
        Book::create(['book_name' => 'Percy Jackson a Maldição do Tita', 
        'genre' => 'Acao e aventura, Mitologia grega, Fantasia', 
        'writer_id' => '1', 'status' => 'rentable' , 
        'book_cover' => 'pjmtita.jpg',
        'synopsis' => 'Um monstro ancestral foi despertado - um ser com poder suficiente para destruir o Olimpo -, e Ártemis, a única deusa capaz de encontrá-lo, desapareceu. Percy e seus amigos têm apenas uma semana para resgatar a deusa sequestrada e solucionar o mistério que ronda o monstro que ela caçava.']);
            
        Book::create(['book_name' => 'A Culpa é das Estrelas', 
        'genre' => 'Romance, Drama', 
        'writer_id' => '3', 'status' => 'rentable' , 
        'book_cover' => 'acedestrelas.jpg',
        'synopsis' => 'O livro segue a história de dois adolescentes com câncer que se apaixonam. É um dos livros mais conhecidos de John Green e foi adaptado para um filme de sucesso em 2014.']);

        Book::create(['book_name' => 'Cidades de Papel', 
        'genre' => 'Romance, Misterio', 
        'writer_id' => '3', 'status' => 'rentable' , 
        'book_cover' => 'cdpapel.jpg',
        'synopsis' => ' O livro segue a história de um jovem que se apaixona por sua vizinha misteriosa, que desaparece subitamente. Ele se junta a seus amigos para tentar encontrá-la.']);

        Book::create(['book_name' => 'O Teorema Katherine', 
        'genre' => 'Romance, Ficcao juvenil', 
        'writer_id' => '3', 'status' => 'rentable' , 
        'book_cover' => 'tkatherine.jpg',
        'synopsis' => ' O livro segue a história de um jovem prodígio que tenta encontrar um padrão nos seus relacionamentos com mulheres chamadas Katherine, após ser abandonado pela sua última namorada.']);

        Book::create(['book_name' => 'Harry Potter e a Pedra Filosofal', 
        'genre' => 'Acao e aventura, Mundo magico, Fantasia', 
        'writer_id' => '2', 'status' => 'rentable' , 
        'book_cover' => 'hppfilosofal.jpg',
        'synopsis' => 'Inicialmente, os garotos acreditavam que a Pedra Filosofal, que se encontrava protegida em Hogwarts, fosse alvo de Severo Snape, professor da escola, para que este se tornasse rico. Mas os garotos descobrem que Voldemort, enfraquecido, está à procura da Pedra para se tornar um grande bruxo novamente.']);
            
        Book::create(['book_name' => 'Harry Potter e a Camara Secreta', 
        'genre' => 'Acao e aventura, Mundo magico, Fantasia', 
        'writer_id' => '2', 'status' => 'rentable' , 
        'book_cover' => 'hpcsecreta.jpg',
        'synopsis' => 'Nesse livro a Câmara Secreta é aberta, e o mal começa a assolar Hogwarts, alunos começam a ser petrificados e a escola pode ser fechada. Só Harry, Rony e Hermione podem impedir isso. Só Harry, Rony e Hermione podem desvendar o mistério e restaurar a paz a escola.']);
            
        Book::create(['book_name' => 'Harry Potter e o Prisioneiro de Azkaban', 
        'genre' => 'Acao e aventura, Mundo magico, Fantasia', 
        'writer_id' => '2', 'status' => 'rentable' , 
        'book_cover' => 'hppazkaban.jpg',
        'synopsis' => 'Após ser acusado de ter entregue os Potter a Voldemort e matado treze trouxas e seu ex-amigo, Black é condenado a prisão perpétua, sendo aprisionado na prisão de Azkaban. Após treze anos, ele foge da prisão para, como todos acreditavam, matar Harry em nome de Voldemort.']);
            
        
    }
}
