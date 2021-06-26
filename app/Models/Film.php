<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'slug', 'release_date', 'rating', 'ticket_price', 'country', 'photo'
    ];

     /**
     * The genres that belong to the film.
     */
    public function genres() {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all records of films with genres in storage.
     *
     * @return array
     */
    public function get_all_films(){

        $films = DB::table('films')
                    ->leftJoin('film_genre', 'films.id', '=', 'film_genre.film_id')
                    ->leftjoin('genres', 'genres.id', '=', 'film_genre.genre_id')
                    ->select('films.*', DB::raw("GROUP_CONCAT(genres.genre SEPARATOR ', ') as genre"))
                    ->groupBy('films.id')
                    ->latest()
                    ->paginate(9);

        return $films;
    }
}
