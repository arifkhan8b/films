<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FilmResource;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::with('genres:genre')->get();
        return response([ 'films' => FilmResource::collection($films), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all();

        // validate the posted input fields submitted by user end using form
        $validator = Validator::make($data, [
            'name' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
            'release_date' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'genres' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        // image uploader
        if ($request->hasFile('photo')) {
            $fileName = time().'_'.$request->file('photo')->getClientOriginalName();
            
            $filePath = $request->file('photo')->storeAs('uploads', $fileName, 'public');

            $fileNameToStore = '/storage/' . $filePath;
            
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }

        $str = strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        
        $data['photo'] = $fileNameToStore;
        $data['slug'] = $slug;

        // insert posted data into database
        $film = Film::create($data);

        // attach genre to film
        foreach($request->genres as $genre){
            $film->genres()->attach($genre);
        }

        return response(['film' => new FilmResource($film), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified film.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        $film = Film::with('genres', 'comments')->where('slug', '=', $slug)->first();
        return response(['film' => new FilmResource($film), 'message' => 'Retrieved successfully'], 200);
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return response(['message' => 'Deleted']);
    }
}
