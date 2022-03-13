<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(env('PAGINATE_LIMIT'));
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate inputs
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);

        // Create a new model
        $post = new Post();

        // Set attributes
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;

        // Upload cover image
        $this->upload_image($request, $post);

        // Store post
        $post->save();

        // Re-direct
        return redirect('/posts')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorised Access');
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Validate inputs
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);

        // Update attributes
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        // Store new cover image
        $this->upload_image($request, $post);

        // Update post
        $post->save();

        // Re-direct
        return redirect('/posts')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Check user is deleting their own post
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorised Access');
        }

        // Delete the cover image from storage
        if ($post->cover_image) {
            Storage::delete('public/cover_images/' . $post->cover_image);
        }

        // Delete the post
        $post->delete();

        // Re-direct
        return redirect('/posts')->with('success', 'Post deleted successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return void
     */
    private function upload_image(Request $request, Post $post) {
        if ($request->hasFile('cover_image')) {

            // Store full name
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Just file extension (e.g. jpg, gif, etc)
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename without extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Create unique filename
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            // Delete the cover image from storage
            if ($post->cover_image) {
                Storage::delete('public/cover_images/' . $post->cover_image);
            }

            // Upload and store path
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);

            // Save storage path
            $post->cover_image = $filenameToStore;
        }
    }
}
