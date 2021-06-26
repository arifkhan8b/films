<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

     /**
     * The films that belong to the genre.
     */
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
