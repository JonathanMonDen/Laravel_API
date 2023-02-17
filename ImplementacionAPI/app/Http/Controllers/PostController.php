<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        if ($posts->count() > 0) {
            return response()->json([
                'data' => $posts,
                'message' => 'Succeed',
            ], 200);
        } else {
            return response()->json([
                'data' => [],
                'message' => 'No posts found',
            ], 404);
        }
    }

    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);

            return response()->json([
                'data' => $post,
                'message' => 'Succeed',
            ], 200); 
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'data' => [],
                'message' => 'Post not found',
            ], 404);
        }
    }
}
