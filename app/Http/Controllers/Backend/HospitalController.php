<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Hospital;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::with("departments", "area")->orderBy("id", "desc")->paginate(10);
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
        $days = $request->schedules;
        $schedules = [];
        if (!empty($days)) {
            foreach ($days as $day) {
                $schedules[$day] = [
                    "start_time" => $request["$day" . "_start_time"],
                    "end_time" => $request["$day" . "_end_time"],
                ];
            }

        }

        $validation = $this->hospitalValidation($request, $schedules);

        if ($validation) {
            return redirect()
                ->back()
                ->withErrors($validation)
                ->withInput();
        }
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
        $slug = $request->input("slug", strtolower(str_replace(" ", "-", $request->name)));
        $hospital->name = $request->name;
        $hospital->slug = $slug;
        $hospital->email = $request->email;
        $hospital->phone = $request->phone;
        $hospital->area_id = $request->area_id;
        $hospital->website = $request->website;
        $hospital->schedules = $schedules;
        $hospital->description = $request->description;
        $hospital->status = $request->status;
        $hospital->type = $request->type;
        $hospital->address = $request->address;
        $hospital->save();
        $hospital->departments()->sync($request->department_id);
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
        $days = $request->schedules;
        $schedules = [];
        if (!empty($days)) {
            foreach ($days as $day) {
                $schedules[$day] = [
                    "start_time" => $request["$day" . "_start_time"],
                    "end_time" => $request["$day" . "_end_time"],
                ];
            }

        }

        $validation = $this->hospitalValidation($request, $schedules);

        $hospital = Hospital::find($id);
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            if($hospital->image){
                unlink(public_path("uploads/hospitals/".$hospital->image));
            }
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/hospitals"), $fileName);
            $hospital->image = $fileName;
        }
        if ($request->hasFile("background_image")) {
            $image = $request->file("background_image");
            if($hospital->background_image){
                unlink(public_path("uploads/hospitals/".$hospital->background_image));
            }
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/hospitals"), $fileName);
            $hospital->background_image = $fileName;
        }
        $slug = $request->input("slug", strtolower(str_replace(" ", "-", $request->name . "-" . $id)));
        $hospital->name = $request->name;
        $hospital->slug = $slug;
        $hospital->email = $request->email;
        $hospital->phone = $request->phone;
        $hospital->area_id = $request->area_id;
        $hospital->website = $request->website;
        $hospital->schedules = $schedules;
        $hospital->description = $request->description;
        $hospital->status = $request->status;
        $hospital->type = $request->type;
        $hospital->address = $request->address;
        $hospital->save();
        $hospital->departments()->sync($request->department_id);
        if ($hospital) {
            toastr()->success("Hospital updated successfully");
            return redirect()->route("hospitals.index");
        }
        else{
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
    private function hospitalValidation(Request $request, array $data = [])
    {

        $daysRules = [];
        if (count($data) > 0) {
            foreach ($data as $key => $day) {

                $daysRules["$key" . "_start_time"] = "required";
                $daysRules["$key" . "_end_time"] = "required";
            }
        }

        $validation = Validator::make($request->all(), [
            "name" => "required",
            "email" => "nullable|email|",
            "phone" => "required",
            "image" => "nullable|image",
            "background_image" => "nullable|image",
            "address" => "required",
            "website" => "nullable|url",
            "type" => "required|in:hospital,clinic",
            "area_id" => "required|numeric",
            "department_id" => "required|array",
            "department_id.*" => "required|numeric|exists:departments,id",
            "description" => "required",
            "schedules" => "required|array",
            ...$daysRules,
        ]);
        if ($validation->fails()) {
            return $validation;
        }

    }
}
