<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class BlogController extends Controller
{
    function index(Request $request)
    {
        $title = $request->title;
        $blogs = DB::table('blogs')->where('title', 'like', '%' . $title . '%')->Paginate(15);

        return view('blog', ['blogs' => $blogs,'title'=> $title]);

        // return $blogs;
        // dd($blogs);   // buat debugging (biar terlihat lebih jelas query sql-nya pas diwebnya)




        // return view('blog', ['intro' => 'anjuayy']);
        // $blogs = Blog::all();
        // return $blogs;


        // $title = $request->title;
        // $blogs = Blog::where('title', 'LIKE', '%' . $title . '%')->orderby('id', 'desc')->get()->paginate(10);
        // return view('blog', ['blogs' => $blogs, 'title' => $title]);
        // return $blogs;
    }

    // function create(Request $request)
    // {
    //     Blog::create($request->all());

    //     protected $fillable ={
    //         'title', 'description'
    //     }
    // }
}
