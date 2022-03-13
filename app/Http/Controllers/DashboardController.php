<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $posts = $user
            ->posts()
            ->orderBy('created_at', 'desc')
            ->paginate(env('PAGINATE_LIMIT'));
        return view('dashboard', compact('posts'));
    }
}
