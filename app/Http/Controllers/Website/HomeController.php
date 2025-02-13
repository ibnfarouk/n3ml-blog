<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::with('user')->ofPublished()->latest('published_at')->simplePaginate(6);
        return view('website.home', compact('posts'));
    }
}
