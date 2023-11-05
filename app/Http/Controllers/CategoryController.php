<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy("id", "desc")->paginate(10);

        return view("backend.pages.category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.category.create");
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
                "name" => "required|max:100|unique:categories,name",
                "description" => "nullable",
                "status" => "required|in:active,inactive",
                "image" => "nullable|image",
            ]
        );
        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                toastr()->error($error);
            }
            return redirect()->back();
        }
        $data = $request->except("_token");
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $fileName = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path("uploads/category"), $fileName);
            $data["image"] = $fileName;
        }
        if (!$data["slug"]) {
            $data["slug"] = Str::slug($data["name"]);
        }
        $status = Category::create($data);
        if ($status) {
            toastr()->success("Category created successfully");
            return redirect()->route("categories.index");
        } else {
            toastr()->error("Something went wrong");
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("backend.pages.category.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:100|unique:categories,name,' . $category->id,
                "description" => "nullable",
                "status" => "required|in:active,inactive",
                "image" => "nullable|image",
            ]
        );
        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                toastr()->error($error);
            }
            return redirect()->back();
        }
        $data = $request->except("_token");
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $fileName = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path("uploads/category"), $fileName);
            $data["image"] = $fileName;
        } else {
            $data["image"] = $category->image;
        }
        if (!$data["slug"]) {
            $data["slug"] = Str::slug($data["name"]);
        }
        $status = $category->update($data);
        if ($status) {
            toastr()->success("Category updated successfully");
            return redirect()->route("categories.index");
        } else {
            toastr()->error("Something went wrong");
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
