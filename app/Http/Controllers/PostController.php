<?php

namespace App\Http\Controllers;

use App\Post;
use App\Utilities\Linker;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
     * @param  \Illuminate\Http\Request $request
     * @param Linker $linker
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Linker $linker)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        Post::create([
            'title' => $title,
            'content' => $linker->autolink($content),
        ]);

        return redirect()->route('posts.create')
                         ->with('success', true);
    }
}
