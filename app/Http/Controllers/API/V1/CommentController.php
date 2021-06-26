<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Comment::all();
        return response([ 'comments' => CommentResource::collection($films), 'message' => 'Retrieved successfully'], 200);
    }

   /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        // validate the posted input fields submitted by user end using form
        $validator = Validator::make($data, [
            'film_id' => 'required',
            'name'=>'required',
            'comments'=>'required',
        ]);
        
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        $comment = Comment::create($input);
   
        return response(['comment' => new CommentResource($comment), 'message' => 'Created successfully'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response(['message' => 'Deleted']);
    }
}
