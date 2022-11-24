<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::select('id','title','content')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        try{
            Post::create($request->post());

            return response()->json([
                'message'=>'Post Created Successfully!!'
            ]);
        }catch(\Exception $e){
            // \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while creating a post!!'
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response()->json([
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        try{

            $post->fill($request->post())->update();

            return response()->json([
                'message'=>'Post Updated Successfully!!'
            ]);

        }catch(\Exception $e){
            // \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while updating a post!!'
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {

            $post->delete();

            return response()->json([
                'message'=>'Post Deleted Successfully!!'
            ]);
            
        } catch (\Exception $e) {
            // \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a post!!'
            ]);
        }
    }
}