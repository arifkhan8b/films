<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

        $films = Film::with('genres:genre')->latest()->paginate(9);

        return $films;
    }
    
    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
  
        static::created(function ($film) {
            $film->slug = $film->createSlug($film->name);
            $film->save();
        });
    }

    /** 
     * Create unique slug
     *
     * @return response()
     */
    private function createSlug($name){
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
  
            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
  
            return "{$slug}-2";
        }
  
        return $slug;
    }
}
