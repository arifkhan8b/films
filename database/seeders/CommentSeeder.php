<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('comments')->insert([
            [
                'user_id' => 1,
                'film_id' => 1,
                'name' => 'Ali Ahmed',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 2,
                'name' => 'Zeshan Ahmed',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 3,
                'name' => 'Faraz Ahmed',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 4,
                'name' => 'Bakir Butt',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 5,
                'name' => 'Fiza Ali',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 6,
                'name' => 'Shakir Saigal',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 7,
                'name' => 'Irfan Malik',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 8,
                'name' => 'Zudiba Bkhtawar',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 9,
                'name' => 'Hina Ali',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 10,
                'name' => 'Fawad Ali',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 11,
                'name' => 'Fahad Malik',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],
            [
                'user_id' => 1,
                'film_id' => 12,
                'name' => 'Harim Shan',
                'comments' => 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum',
            ],

        ]);
    }
}
