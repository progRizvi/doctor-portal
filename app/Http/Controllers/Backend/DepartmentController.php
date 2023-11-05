<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy("id", "desc")->paginate(10);
        return view("backend.pages.departments.index", compact("departments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.departments.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = $this->departmentValidation($request);
        if (!$validation) {
            return back();
        }
        $data = $request->except(["_token", "image"]);

        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/departments"), $fileName);
            $data["image"] = $fileName;
        }
        if (!isset($data["slug"])) {
            $data["slug"] = Str::slug($data["name"]);
        }
        $department = Department::create($data);
        if ($department) {
            toastr()->success("Department Created Successfully");
            return to_route("departments.index");
        }
        else{
            toastr()->error("Department Not Created");
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view("backend.pages.departments.edit", compact("department"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['id'] = $id;
        $validation = $this->departmentValidation($request);
        if (!$validation) {
            return back();
        }
        $data = $request->except(["_token", "image"]);
        $department = Department::findOrFail($id);
        $data["image"] = $department->image;

        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/departments"), $fileName);
            $data["image"] = $fileName;
        }
        if (!isset($data["slug"])) {
            $data["slug"] = Str::slug($data["name"]);
        }

        $department->update($data);
        toastr()->success("Department Updated Successfully");
        return to_route("departments.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        if ($department) {
            $department->delete();
            toastr()->success("Department Deleted Successfully");
            return back();
        } else {
            toastr()->error("Department Not Found");
            return back();
        }
    }
    private function departmentValidation(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('departments', 'name')->ignore($id),
            ],
            'slug' => 'nullable|string|max:255',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
            'status' => 'in:active,inactive',
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                toastr()->error($error);

            }
            return false;
        }
        return true;
    }
}
