<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\Film::factory(3)->create();
        // \App\Models\Genre::factory(1)->create();
        $this->call(GenresSeeder::class);
        $this->call(FilmGenreSeeder::class);
        $this->call(FilmSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
