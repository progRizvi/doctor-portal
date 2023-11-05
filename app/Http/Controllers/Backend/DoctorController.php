<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Department;
use App\Models\Doctor;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::with("departments", "area")->orderBy("id", "desc")->paginate(10);
        return view("backend.pages.doctors.index", compact("doctors"));
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
        return view("backend.pages.doctors.create", compact(["divisions", "departments"]));
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
        foreach ($days as $day) {
            $schedules[$day] = [
                "start_time" => $request["$day" . "_start_time"],
                "end_time" => $request["$day" . "_end_time"],
            ];
        }

        $validation = $this->doctorValidation($request, $days);

        if (!$validation) {
            return back();
        }

        $doctor = new Doctor();
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/doctors"), $fileName);
            $doctor->image = $fileName;
        }
        if ($request->hasFile("background_image")) {
            $image = $request->file("background_image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/doctors"), $fileName);
            $doctor->background_image = $fileName;
        }
        $doctor->name = $request->name;
        $doctor->slug = strtolower(str_replace(" ", "-", $request->name));
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->area_id = $request->area_id;
        $doctor->gender = $request->gender;
        $doctor->treatments = preg_replace('/\s+/', ' ', $request->treatments);
        $doctor->departments()->sync($request->department_id);
        $doctor->schedules = $schedules;
        $doctor->new_patient_fee = $request->new_patient_fee;
        $doctor->old_patient_fee = $request->old_patient_fee;
        $doctor->bio = $request->bio;
        $doctor->description = $request->description;
        $doctor->status = $request->status;
        $doctor->hospital = $request->hospital;
        $doctor->address = $request->address;
        $doctor->save();
        if ($doctor) {
            toastr()->success("Doctor Created Successfully");
            return redirect()->route("doctors.index");
        } else {
            toastr()->error("Doctor Creation Failed");
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
        $doctor = Doctor::with("departments", "area")->find($id);
        $divisions = Division::orderBy('name', 'asc')->get();
        $departments = Department::orderBy('name', 'asc')->get();
        return view("backend.pages.doctors.edit", compact(["doctor", "divisions", "departments"]));
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

        $days = $request->schedules;
        $schedules = [];
        foreach ($days as $day) {
            $schedules[$day] = [
                "start_time" => $request["$day" . "_start_time"],
                "end_time" => $request["$day" . "_end_time"],
            ];
        }

        $validation = $this->doctorValidation($request, $days);

        if (!$validation) {
            return back();
        }

        $doctor = Doctor::find($id);
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/doctors"), $fileName);
            $doctor->image = $fileName;
        }
        if ($request->hasFile("background_image")) {
            $image = $request->file("background_image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/doctors"), $fileName);
            $doctor->background_image = $fileName;
        }
        $doctor->name = $request->name;
        $doctor->slug = strtolower(str_replace(" ", "-", $request->name));
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->area_id = $request->area_id;
        $doctor->gender = $request->gender;
        $doctor->treatments = preg_replace('/\s+/', ' ', $request->treatments);
        $doctor->new_patient_fee = $request->new_patient_fee;
        $doctor->old_patient_fee = $request->old_patient_fee;
        $doctor->bio = $request->bio;
        $doctor->departments()->sync($request->department_id);
        $doctor->schedules = $schedules;
        $doctor->description = $request->description;
        $doctor->status = $request->status;
        $doctor->hospital = $request->hospital;
        $doctor->address = $request->address;
        $doctor->save();
        if ($doctor) {
            toastr()->success("Doctor Updated Successfully");
            return redirect()->route("doctors.index");
        } else {
            toastr()->error("Doctor Update Failed");
            return back();
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
        //
    }
    public function getDistricts($id)
    {
        $districts = Division::find($id)->districts;
        return response()->json($districts);
    }
    public function getAreas($id)
    {
        $areas = Area::where("district_id", $id)->get();
        return response()->json($areas);
    }
    private function doctorValidation(Request $request, array $data = [])
    {

        $daysRules = [];
        foreach ($data as $day) {
            $daysRules["$day" . "_start_time"] = "required";
            $daysRules["$day" . "_end_time"] = "required";
        }

        $validation = Validator::make($request->all(), [
            "name" => "required",
            "email" => "nullable|email|",
            "phone" => "required",
            "image" => "nullable|image",
            "gender" => "required",
            "area_id" => "required|numeric",
            "department_id" => "required|array",
            "department_id.*" => "required|numeric|exists:departments,id",
            "new_patient_fee" => "required|numeric",
            "old_patient_fee" => "required|numeric",
            "bio" => "required",
            "schedules" => "required|array",
            ...$daysRules,
        ]);
        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $err) {
                toastr()->error($err);
            }
            return false;
        }
        return true;
    }
    public function daysValidation(Request $request, array $data)
    {

    }
}
