<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class FilmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Film::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        $imageUrl = $faker->imageUrl(640,480, null, false);

        return [
            'name' => $this->faker->name(),
            'description' => Str::random(50),
            'slug' => Str::random(50),
            'release_date' => '2021-07-14',
            'rating' => '1',
            'ticket_price' => $this->faker->randomNumber(2),
            'country' => 'USA',
            'photo' => $imageUrl
        ];
    }

}
