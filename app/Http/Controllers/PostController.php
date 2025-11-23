<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\post;
use App\Models\Post as ModelsPost;
use App\Models\Product;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = ModelsPost::select('id', 'title', 'body')->get();

        return response()->json([
            'success' => true,
            'message' => 'Posts retrieved successfully',
            'data' => $posts
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedArgs = request()->validate([
            'title' => 'string|required',
            'body' => 'string|required'
        ]);

        $post = ModelsPost::create($validatedArgs);

        return response()->json([
                'success' => true,
                'message' => 'Post created successfully',
            'data' => $post
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = ModelsPost::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Post retrieved successfully',
            'data' => $post
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = ModelsPost::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }

        $validatedArgs = $request->validate([
            'title' => 'sometimes|string',
            'body' => 'sometimes|string'
        ]);

        $post->update($validatedArgs);

        return response()->json([
            'success' => true,
            'message' => 'Post updated successfully',
            'data' => $post
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = ModelsPost::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }

        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully'
        ], 200);
    }
}
