<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Film;
use App\Models\Genre;

use Illuminate\Support\Str;

class FilmsController extends Controller
{
   /**
     * Display a listing of the film.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $filmObj = new Film();

        $films = $filmObj->get_all_films();
     
        return view('films.index',compact('films'))
            ->with('i', (request()->input('page', 1) - 1) * 9);
    }

    /**
     * Show the form for creating a new film.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }

    /**
     * Store a newly created film in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // making slug
        $str = strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        
        // validate the posted input fields submitted by user end using form
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
            'release_date' => 'required',
            'photo' => 'image|required',
            'genres' => 'required'
        ]);

        // image uploader
        if ($request->hasFile('photo')) {
            $fileName = time().'_'.$request->file('photo')->getClientOriginalName();
            
            $filePath = $request->file('photo')->storeAs('uploads', $fileName, 'public');

            $fileNameToStore = '/storage/' . $filePath;
            
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }
        
        $requestData = $request->all();
        $requestData['photo'] = $fileNameToStore;
        $requestData['slug'] = $slug;

        // insert posted data into database
        $film = Film::create($requestData);

        // attach genre to film
        foreach($request->genres as $genre){
            $film->genres()->attach($genre);
        }
        
        return redirect()->route('films.index')
                        ->with('success','Film created successfully.');
    }

    /**
     * Display the specified film.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        $film = Film::with('genres:genre')->where('slug', '=', $slug)->first();

        return view('films.show',compact('film'));
    } 
     
    /**
     * Show the form for editing the specified film.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return view('films.edit',compact('film'));
    }
    
    /**
     * Update the specified film in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('films.index')
                        ->with('success','Film updated successfully');
    }
    
    /**
     * Remove the specified film from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
    
        return redirect()->route('films.index')
                        ->with('success','Film deleted successfully');
    }
}
