<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Department;
use App\Models\Doctor;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Doctor::query();

        $searchTerm = request()->search;

        if ($searchTerm) {
            $query->orWhere(function ($query) use ($searchTerm) {
                $fields = ['name', 'bn_name', 'email', 'phone', 'address'];

                foreach ($fields as $field) {
                    $query->orWhere($field, 'LIKE', "%" . $searchTerm . "%");
                }
                // debug($query->toSql());
            });
        } else {
            $query->orderBy("serial", "asc");
        }
        $doctors = $query->with("departments", "area")->paginate(10);
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
        if (!empty($days)) {
            foreach ($days as $day) {
                $schedules[$day] = [
                    "start_time" => $request["$day" . "_start_time"],
                    "end_time" => $request["$day" . "_end_time"],
                ];
            }
        }

        $this->doctorValidation($request);

        $doctor = new Doctor();

        $serial = ($request->serial != -1 && $request->serial != 0 && gettype($doctor->serial) != "NULL") ? $doctor->serial : Doctor::count() + 1;

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
        $doctor->bn_name = $request->bn_name;
        $doctor->slug = Str::slug($request->slug ? $request->slug : $request->name);
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->serial = $serial;
        $doctor->area_id = $request->area_id;
        $doctor->gender = $request->gender;
        $doctor->treatments = preg_replace('/\s+/', ' ', $request->treatments);
        $doctor->bn_treatments = preg_replace('/\s+/', ' ', $request->bn_treatments);
        $doctor->schedules = $schedules;
        $doctor->new_patient_fee = $request->new_patient_fee;
        $doctor->old_patient_fee = $request->old_patient_fee;
        $doctor->bio = $request->bio;
        $doctor->bn_bio = $request->bn_bio;
        $doctor->description = $request->description;
        $doctor->bn_description = $request->bn_description;
        $doctor->status = $request->status ? $request->status : "active";
        $doctor->hospital = $request->hospital;
        $doctor->bn_hospital = $request->bn_hospital;
        $doctor->meta_description = $request->meta_description;
        $doctor->meta_keywords = $request->meta_keywords;
        $doctor->address = $request->address;
        $doctor->bn_address = $request->bn_address;
        $doctor->save();
        $doctor->departments()->sync($request->department_id);
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

        if (!empty($days)) {
            foreach ($days as $day) {
                $schedules[$day] = [
                    "start_time" => $request["$day" . "_start_time"],
                    "end_time" => $request["$day" . "_end_time"],
                ];
            }
        }

        $this->doctorValidation($request);

        $doctor = Doctor::find($id);
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("/uploads/doctors"), $fileName);
            $doctor->image = $fileName;
        }
        if ($request->hasFile("background_image")) {
            $image = $request->file("background_image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path() . "/uploads/doctors", $fileName);
            $doctor->background_image = $fileName;
        }
        $doctor->name = $request->name;
        $doctor->bn_name = $request->bn_name;
        $doctor->slug = Str::slug($request->slug ? $request->slug : $request->name);
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->serial = $request->serial;
        $doctor->area_id = $request->area_id;
        $doctor->gender = $request->gender;
        $doctor->treatments = preg_replace('/\s+/', ' ', $request->treatments);
        $doctor->bn_treatments = preg_replace('/\s+/', ' ', $request->bn_treatments);
        $doctor->new_patient_fee = $request->new_patient_fee;
        $doctor->old_patient_fee = $request->old_patient_fee;
        $doctor->bio = $request->bio;
        $doctor->bn_bio = $request->bn_bio;
        $doctor->departments()->sync($request->department_id);
        $doctor->schedules = $schedules;
        $doctor->description = $request->description;
        $doctor->bn_description = $request->bn_description;
        $doctor->status = $request->status;
        $doctor->hospital = $request->hospital;
        $doctor->bn_hospital = $request->bn_hospital;
        $doctor->meta_description = $request->meta_description;
        $doctor->meta_keywords = $request->meta_keywords;
        $doctor->address = $request->address;
        $doctor->bn_address = $request->bn_address;
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
        $doctor = Doctor::find($id);
        if ($doctor) {
            if ($doctor->image) {
                if (file_exists(public_path("uploads/doctors/" . $doctor->image))) {
                    unlink(public_path("uploads/doctors/" . $doctor->image));
                }
            }
            if ($doctor->background_image) {
                if (file_exists(public_path("uploads/doctors/" . $doctor->background_image))) {
                    unlink(public_path("uploads/doctors/" . $doctor->background_image));
                }
            }
            $doctor->delete();
            toastr()->success("Doctor Deleted Successfully");
            return redirect()->route("doctors.index");
        }
        toastr()->error("Doctor Deletion Failed");
        return back();
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
    private function doctorValidation(Request $request)
    {

        $request->validate([
            "name" => "required",
            "email" => "nullable|email|",
            "phone" => "required",
            "image" => "nullable|image",
            "gender" => "required",
            "division_id" => "required",
            "district_id" => "required",
            "status" => "required|in:active,inactive",
            "area_id" => "required|numeric",
            "treatments" => "required",
            "department_id" => "required|array",
            "department_id.*" => "required|numeric|exists:departments,id",
            "new_patient_fee" => "nullable|numeric",
            "old_patient_fee" => "nullable|numeric",
            "bio" => "required",
            "schedules" => "required|array",
        ]);
    }
    public function updateStatusTopDoctor(string $id)
    {
        $doctor = Doctor::find($id);
        $status = $doctor->top_doctor == 1 ? 0 : 1;
        $doctor->update(['top_doctor' => $status]);
        $doctor->save();
        toastr()->success("Top Doctor Status Changed");
        return back();

    }
}
