<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        $posts = Post::where('published', '=', true)
            ->where('nsfw', '=', false)
            ->orderBy('published_at', 'DESC')
            ->with('user')
            ->get();

        return view('homepage', compact('posts'));
    }
}
