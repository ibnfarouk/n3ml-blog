<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BloggerController extends Controller
{
    public function index()
    {
        $bloggers = User::ofBloggers()->paginate();
        return view('admin.bloggers.index', compact('bloggers'));
    }

    public function destroy($id)
    {
        return redirect()->route('admin.bloggers.index');
    }
}
