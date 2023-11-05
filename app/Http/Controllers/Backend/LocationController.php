<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function index()
    {
        $areas = Area::paginate(20);
        return view('backend.pages.location.index', compact("areas"));
    }
    public function create()
    {
        $divisions = Division::all();
        return view('backend.pages.location.create', compact("divisions"));
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "name" => "required",
            "district_id" => "required",
        ]);
        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                toastr()->error($error);
            }
            return back();
        }
        $data = $request->except(["_token", "division"]);
        $area = Area::create($data);
        if ($area) {

            toastr()->success("Area created successfully");
            return redirect()->route('areas.index');
        }
        toastr()->error("Something went wrong");
        return back();
    }
    public function edit(Area $area)
    {
        $divisions = Division::all();
        return view('backend.pages.location.edit', compact("divisions", "area"));
    }
    public function update(Request $request, Area $area)
    {
        $validation = Validator::make($request->all(), [
            "name" => "required",
            "district_id" => "required",
        ]);
        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                toastr()->error($error);
            }
            return back();
        }
        $data = $request->except(["_token", "division"]);

        $area = $area->update($data);
        if ($area) {
            toastr()->success("Area updated successfully");
            return redirect()->route('areas.index');
        }
        toastr()->error("Something went wrong");
        return back();
    }
    public function destroy(Area $area)
    {
        $area->delete();
        toastr()->success("Area deleted successfully");
        return back();
    }
    public function getDistricts(Request $request)
    {
        $districts = Division::find($request->division_id)->districts;
        return response()->json($districts);
    }

}
