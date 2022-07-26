<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $term = $request->term ?? "";
        if ($term != "") {
            $posts = Post::where('title', 'LIKE', '%' . $term . '%')->with('category')->paginate(2);
        } else {
            $posts = Post::when(request('category_id'), function ($query) {
                $query->where('category_id', request('category_id'));
            })
                ->latest()
                ->with('category')
                ->paginate(5);
        }

        return view('home.home', compact('categories', 'posts', 'term'));
    }

    // public function search($term)
    // {
    //     $posts = Post::where([
    //         ['title', '!=', null],
    //         [function ($query) use ($term) {
    //             if (($term)) {
    //                 $query->orWhere('title', 'LIKE', '%' . $term . '%')->get();
    //             }
    //         }]
    //     ])
    //         ->latest()
    //         ->paginate(5);

    //     return view('home.home', compact('posts'));
    // }

    public function about()
    {
        return view('home.about');
    }

    public function showPost(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
