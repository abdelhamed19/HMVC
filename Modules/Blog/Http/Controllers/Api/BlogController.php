<?php

namespace Modules\Blog\Http\Controllers\Api;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Blog\Entities\Post;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $blogs = Post::latest()->paginate(5);
        if (!$blogs) {
            return $this->errorResponse('No posts found', 404);
        }
        return $this->successResponse($blogs, 'Posts retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        Post::create($request->all());
        return response()->json(['message' => 'Post created successfully']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return $this->errorResponse('No posts found', 404);
        }
        return $this->successResponse($post, 'Post retrieved successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $post = Post::find($id);
        if (!$post) {
            return $this->errorResponse('No posts found', 404);
        }
        $post->update($request->all());
        return $this->successResponse($post, 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return $this->errorResponse('No posts found', 404);
        }
        $post->delete();
        return $this->successResponse($post, 'Post deleted successfully');
    }
}
