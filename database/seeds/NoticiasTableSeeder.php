<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('noticias')
                    ->insert([
                        [
                            'titulo'=>'Bajo el Dolar',
                            'noticia'=>'Esto es un clickbait, no era verdad',
                            'autor'=>'Pepe Peposo',
                            'imagen'=>'dolar.jpg'
                        ],
                        [
                            'titulo'=>Str::random(25),
                            'noticia'=>Str::random(15).' '.Str::random(7).' '.Str::random(10),
                            'autor'=>Str::random(24),
                            'imagen'=>Str::random(14).'jpg'
                        ]
                    ]);
    }
}
