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
        //menggunakan Query Builder 
        // $title = $request->title;
        // $blogs = DB::table('blogs')->where('title', 'like', '%' . $title . '%')->orderBy('id', 'desc')->Paginate(15);
        // return view('blog', ['blogs' => $blogs, 'title' => $title]);


        // ini menggunakan Eloquent
        $title = $request->title;
        $blogs = Blog::where('title', 'like', '%' . $title . '%')->orderBy('id', 'desc')->paginate(7);
        return view('blog', ['blogs' => $blogs, 'title' => $title]);



        // buat debugging (biar terlihat lebih jelas query sql-nya pas diwebnya)
        // dd($blogs);   

        // return view('blog', ['intro' => 'anjuayy']);
        // $blogs = Blog::all();
        // return $blogs;


        // $title = $request->title;
        // $blogs = Blog::where('title', 'LIKE', '%' . $title . '%')->orderby('id', 'desc')->get()->paginate(10);
        // return view('blog', ['blogs' => $blogs, 'title' => $title]);
        // return $blogs;
    }
    function add()
    {
        return view('blog-add');
    }

    function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'description' => 'required',
        ]);

        // Query Builder
        // DB::table('blogs')->insert([
        //     'title' => $request->title,
        //     'description' => $request->description
        // ]);

        // Eloquent
        Blog::create($request->all());

        Session::flash('message', 'New Blog Succesfully Added!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('blog');
    }


    function show($id)
    {
        // Query builder
        // $blog = DB::table('blogs')->where('id', $id)->first();
        // if (!$blog) {
        //     abort(404);
        // }


        //Eloquent
        $blog= Blog::findorfail($id); // mencari data dan sekaligus menampilkan 404 not found jika data tdk ditemukan
        // $blog= Blog::find($id)->first;



        return view('blog-detail', ['blog' => $blog]);
    }

    function edit($id)
    {
        // Query Builder
        // $blog = DB::table('blogs')->where('id', $id)->first();
        // if (!$blog) {
        //     abort(404);
        // }

        //Eloquent
        $blog = Blog::findorfail($id);

        return view('blog-edit', ['blog' => $blog]);
    }

    function update(Request $request, $id)
    {

        $validated = $request->validate([
            'title' => 'required|unique:blogs,title,' . $id . '|max:255',
            'description' => 'required',
        ]);

        DB::table('blogs')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
        Session::flash('message', 'Blog Succesfully Updated!');
        Session::flash('alert-class', 'alert-info');
        return redirect()->route('blog');
    }

    function delete($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->delete();
        Session::flash('message', 'Blog Succesfully delete');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->route('blog');
    }



    // function create(Request $request)
    // {
    //     Blog::create($request->all());

    //     protected $fillable ={
    //         'title', 'description'
    //     }
    // }
}
