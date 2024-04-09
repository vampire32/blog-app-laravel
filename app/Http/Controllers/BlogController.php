<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()

    {

        $blogs=Blog::orderBy("created_at","DESC")->paginate(10);
      return view("blog.index",[
        "blogs"=>$blogs
      ]);
    }

    public function create()
    {
        return view("blog.create");
    }


    public function store(Request $request)
    {
        $data=$request->validate([
           'title'=>'required|string',
           'description'=>'required|string',
        ]);

        $data['user_id']=1;
       Blog::Create($data);

       return to_route("blog.index")->with("Success", 'Blog created successfully');



    }


    public function show(Blog $blog)
    {
        return view("blog.show",[
            "blog"=>$blog
        ]);
    }


    public function edit(Blog $blog)
    {
        return view("blog.edit",[
            "blog"=>$blog
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $data=$request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $blog->update($data);
        return to_route("blog.show",$blog)->with("success","Blog updated sucessfully");
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();

        return to_route("blog.index")->with("success","Blog Deleted successfully");
    }
}
