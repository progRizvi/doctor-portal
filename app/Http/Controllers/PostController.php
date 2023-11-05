<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->paginate(10);
        return view("backend.pages.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("backend.pages.posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                "title" => "required",
                "category_id" => "required",
                "content" => "required",
                "posted_at" => "required",
                "meta_description" => "required",
                "meta_keywords" => "required",
            ]
        );
        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                toastr()->error($error);
            }
            return redirect()->back();
        }
        $data = $request->except("_token");
        $data["author_id"] = auth()->user()->id;

        if (!$request->slug) {
            $data["slug"] = Str::slug($request->title);
        } else {
            $data["slug"] = Str::slug($request->slug, '-');
        }

        if ($request->hasFile("thumbnail")) {
            $file = $request->file("thumbnail");
            $fileName = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path("uploads/thumbnail"), $fileName);
            $data["thumbnail"] = $fileName;
        }
        $post = Post::create($data);
        if ($post) {
            toastr()->success("Post created successfully");
            return redirect()->route("posts.index");
        } else {
            toastr()->error("Post could not be created");
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view("backend.pages.posts.edit", compact("post", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $validation = Validator::make(
            $request->all(),
            [
                "title" => "required",
                "category_id" => "required",
                "content" => "required",
                "posted_at" => "required",
                "meta_description" => "required",
                "meta_keywords" => "required",
            ]
        );
        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                toastr()->error($error);
            }
            return redirect()->back();
        }
        $data = $request->except("_token");
        $data["author_id"] = auth()->user()->id;

        if (!$request->slug) {
            $data["slug"] = Str::slug($request->title);
        } else {
            $data["slug"] = Str::slug($request->slug, '-');
        }
        $data["thumbnail"] = $post->thumbnail;
        if ($request->hasFile("thumbnail")) {
            $file = $request->file("thumbnail");
            $fileName = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path("uploads/thumbnail"), $fileName);
            $data["thumbnail"] = $fileName;
        }
        $post->update($data);
        if ($post) {
            toastr()->success("Post updated successfully");
            return redirect()->route("posts.index");
        } else {
            toastr()->error("Post could not be updated");
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post) {
            $post->delete();
            toastr()->success("Post deleted successfully");
            return redirect()->route("posts.index");
        }
        toastr()->error("Post could not be deleted");
        return back();

    }
}
