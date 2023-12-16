<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Hospital;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::with("area")->orderBy("id", "desc")->paginate(10);
        return view("backend.pages.hospitals.index", compact("hospitals"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::orderBy('name', 'asc')->get();
        $departments = Department::orderBy('name', 'asc')->get();
        return view("backend.pages.hospitals.create", compact(["divisions", "departments"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->hospitalValidation($request);

        $hospital = new Hospital();
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/hospitals"), $fileName);
            $hospital->image = $fileName;
        }
        if ($request->hasFile("background_image")) {
            $image = $request->file("background_image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/hospitals"), $fileName);
            $hospital->background_image = $fileName;
        }

        $slug = $request->input("slug");
        $generateSlug = Str::slug($slug ? $slug : $request->name) . '-' . uniqid();
        $hospital->name = $request->name;
        $hospital->slug = $generateSlug;
        $hospital->email = $request->email;
        $hospital->phone = $request->phone;
        $hospital->area_id = $request->area_id;
        $hospital->website = $request->website;
        $hospital->schedules = "all_day";
        $hospital->description = $request->description;
        $hospital->status = $request->status;
        $hospital->type = $request->type;
        $hospital->address = $request->address;
        $hospital->save();
        if ($hospital) {
            toastr()->success("Hospital created successfully");
            return redirect()->route("hospitals.index");
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
        $hospital = Hospital::findOrFail($id);
        $divisions = Division::orderBy('name', 'asc')->get();
        $departments = Department::orderBy('name', 'asc')->get();
        return view("backend.pages.hospitals.edit", compact(["divisions", "departments", "hospital"]));
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
        $hospital = Hospital::findOrFail($id);

        $this->hospitalValidation($request);

        $hospital = Hospital::find($id);
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            if ($hospital->image) {

                if (file_exists(public_path("uploads/hospitals/" . $hospital->image))) {
                    unlink(public_path("uploads/hospitals/" . $hospital->image));
                }
            }
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/hospitals"), $fileName);
            $hospital->image = $fileName;
        }
        if ($request->hasFile("background_image")) {
            $image = $request->file("background_image");
            if ($hospital->background_image) {
                if (file_exists(public_path("uploads/hospitals/" . $hospital->background_image))) {
                    unlink(public_path("uploads/hospitals/" . $hospital->background_image));
                }
            }
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/hospitals"), $fileName);
            $hospital->background_image = $fileName;
        }
        $slug = $request->input("slug");
        $generateSlug = Str::slug($slug ? $slug : $request->name) . '-' . uniqid();
        $hospital->name = $request->name;
        $hospital->slug = $generateSlug;
        $hospital->email = $request->email;
        $hospital->phone = $request->phone;
        $hospital->area_id = $request->area_id;
        $hospital->website = $request->website;
        $hospital->description = $request->description;
        $hospital->status = $request->status;
        $hospital->type = $request->type;
        $hospital->address = $request->address;
        $hospital->save();
        if ($hospital) {
            toastr()->success("Hospital updated successfully");
            return redirect()->route("hospitals.index");
        } else {
            toastr()->error("Something went wrong");
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::findOrFail($id)->delete();
        if ($hospital) {
            toastr()->success("Hospital deleted successfully");
            return redirect()->back();
        } else {
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
    private function hospitalValidation(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "nullable|email|",
            "phone" => "required",
            "image" => "nullable|image",
            "background_image" => "nullable|image",
            "address" => "required",
            "website" => "nullable|url",
            "type" => "required|in:hospital,clinic,diagnostic",
            "area_id" => "required|numeric",
            "description" => "required",
            "status" => "required",
        ]);
    }
}
