<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $imageUrl = $faker->imageUrl(640,480, null, false);
        
        \DB::table('films')->insert([
            [
                'name' => 'The Cotton Club',
                'description' => 'The Cotton Club was a famous night club in Harlem. The story follows the people that visited the club, those that ran it, and is peppered with the Jazz music that made it so famous.',
                'release_date' => '1984-07-14',
                'slug' => 'the-cotton-club',
                'rating' => '3',
                'ticket_price' => 200,
                'country' => 'USA',
                'photo' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTU5ODAyNzA4OV5BMl5BanBnXkFtZTcwNzYwNTIzNA@@._V1_SX300.jpg'
            ],
            [
                'name' => 'Crocodile Dundee',
                'description' => 'An American reporter goes to the Australian outback to meet an eccentric crocodile poacher and invites him to New York City.',
                'release_date' => '1986-03-27',
                'slug' => 'crocodile-dundee',
                'rating' => '4',
                'ticket_price' => 250,
                'country' => 'United Kingdom',
                'photo' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTg0MTU1MTg4NF5BMl5BanBnXkFtZTgwMDgzNzYxMTE@._V1_SX300.jpg'
            ],
            [
                'name' => 'The Smurfs',
                'description' => 'lorem ispum  lorem ispum lorem ispum lorem ispum lorem ispum lorem ispum lorem ispumlorem ispumlorem ispumlorem ispumlorem ispumlorem ispum',
                'release_date' => '2011-09-26',
                'slug' => 'the-smurfs',
                'rating' => '2',
                'ticket_price' => 400,
                'country' => 'USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BOTUzNTczYTMtMzdkOC00ODlkLTk1NDMtYWYxMzQyYzI1YmVjXkEyXkFqcGdeQXVyNDQ2MTMzODA@._V1_SY1000_CR0,0,668,1000_AL_.jpg'
            ],
            [
                'name' => 'Ratatouille',
                'description' => 'A rat who can cook makes an unusual alliance with a young kitchen worker at a famous restaurant.',
                'release_date' => '2007-07-14',
                'slug' => 'ratatouille',
                'rating' => '4',
                'ticket_price' => 300,
                'country' => 'China',
                'photo' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTMzODU0NTkxMF5BMl5BanBnXkFtZTcwMjQ4MzMzMw@@._V1_SX300.jpg'
            ],
            [
                'name' => 'Stardust',
                'description' => 'lorem ispum  lorem ispum lorem ispum lorem ispum lorem ispum lorem ispum lorem ispumlorem ispumlorem ispumlorem ispumlorem ispumlorem ispum',
                'release_date' => '2007-04-14',
                'slug' => 'stardust',
                'rating' => '1',
                'ticket_price' => 350,
                'country' => 'Japan',
                'photo' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjkyMTE1OTYwNF5BMl5BanBnXkFtZTcwMDIxODYzMw@@._V1_SX300.jpg'
            ],
            [
                'name' => 'The Prodigy',
                'description' => 'lorem ispum  lorem ispum lorem ispum lorem ispum lorem ispum lorem ispum lorem ispumlorem ispumlorem ispumlorem ispumlorem ispumlorem ispum',
                'release_date' => '2019-06-14',
                'slug' => 'the-prodigy',
                'rating' => '2',
                'ticket_price' => 100,
                'country' => 'USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BYTQxNTMwMmUtMWRkYi00MTRmLTgyYWItYTYwNGZkMWZmMzQ2XkEyXkFqcGdeQXVyMjM4NTM5NDY@._V1_SY1000_SX675_AL_.jpg'
            ],
            [
                'name' => 'Apocalypto',
                'description' =>'lorem ispum  lorem ispum lorem ispum lorem ispum lorem ispum lorem ispum lorem ispumlorem ispumlorem ispumlorem ispumlorem ispumlorem ispum',
                'release_date' => '2017-07-14',
                'slug' => 'apocalypto',
                'rating' => '1',
                'ticket_price' => 200,
                'country' => 'USA',
                'photo' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTM1NjYyNTY5OV5BMl5BanBnXkFtZTcwMjgwNTMzMQ@@._V1_SX300.jpg'
            ],
            [
                'name' => 'Mega Time Squad',
                'description' => 'lorem ispum  lorem ispum lorem ispum lorem ispum lorem ispum lorem ispum lorem ispumlorem ispumlorem ispumlorem ispumlorem ispumlorem ispum',
                'release_date' => '2018-07-14',
                'slug' => 'mega-time-squad',
                'rating' => '1',
                'ticket_price' => 150,
                'country' => 'China',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjMzMzE4MjI0OF5BMl5BanBnXkFtZTgwOTExNDAwNjM@._V1_SY1000_CR0,0,674,1000_AL_.jpg'
            ],
            [
                'name' => 'Killer Reputation',
                'description' =>'lorem ispum  lorem ispum lorem ispum lorem ispum lorem ispum lorem ispum lorem ispumlorem ispumlorem ispumlorem ispumlorem ispumlorem ispum',
                'release_date' => '2019-07-14',
                'slug' => 'killer-reputation',
                'rating' => '1',
                'ticket_price' => 200,
                'country' => 'USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMDAyNzZkYzUtZmRmNy00MzYxLWE0NjYtMWM0MWRiOTg3ZjkyXkEyXkFqcGdeQXVyNjk2Mjc2OTI@._V1_SY1000_CR0,0,706,1000_AL_.jpg'
            ],
            [
                'name' => 'No Country for Old Men',
                'description' => 'lorem ispum  lorem ispum lorem ispum lorem ispum lorem ispum lorem ispum lorem ispumlorem ispumlorem ispumlorem ispumlorem ispumlorem ispum',
                'release_date' => '2007-03-14',
                'slug' => 'no-country-for-old-men',
                'rating' => '1',
                'ticket_price' => 400,
                'country' => 'United Kingdom',
                'photo' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjA5Njk3MjM4OV5BMl5BanBnXkFtZTcwMTc5MTE1MQ@@._V1_SX300.jpg'
            ],
            [
                'name' => 'The Beach',
                'description' => 'lorem ispum  lorem ispum lorem ispum lorem ispum lorem ispum lorem ispum lorem ispumlorem ispumlorem ispumlorem ispumlorem ispumlorem ispum',
                'release_date' => '2000-07-14',
                'slug' => 'the-beach',
                'rating' => '5',
                'ticket_price' => 300,
                'country' => 'USA',
                'photo' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BN2ViYTFiZmUtOTIxZi00YzIxLWEyMzUtYjQwZGNjMjNhY2IwXkEyXkFqcGdeQXVyNDk3NzU2MTQ@._V1_SX300.jpg'
            ],
            [
                'name' => 'Inception',
                'description' => 'lorem ispum  lorem ispum lorem ispum lorem ispum lorem ispum lorem ispum lorem ispumlorem ispumlorem ispumlorem ispumlorem ispumlorem ispum',
                'release_date' => '2010-07-14',
                'slug' => 'inception',
                'rating' => '1',
                'ticket_price' => 200,
                'country' => 'USA',
                'photo' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_SX300.jpg'
            ]
            
        ]);
    }
}
