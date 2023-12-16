<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Department;
use App\Models\ExtraInfo;
use Illuminate\Http\Request;

class ExtraInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$extraInfos = ExtraInfo::paginate(20);
        return view('backend.pages.extraData.index', compact("extraInfos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        $departments = Department::all();
        return view('backend.pages.extraData.create', compact("areas", "departments"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $data = $request->except(["_token"]);
        $makeSlug = strtolower(str_replace(" ", "-", $request->title));
        $data["slug"] = $makeSlug;
        $extraInfo = ExtraInfo::create($data);

        if ($extraInfo) {
            toastr()->success("ExtraInfo created successfully");
            return redirect()->route('extra.index');
        }
        toastr()->error("Something went wrong");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExtraInfo  $extraInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ExtraInfo $extraInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExtraInfo  $extraInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $extraInfo = ExtraInfo::findOrFail($id);
        $areas = Area::all();
        $departments = Department::all();
        return view('backend.pages.extraData.edit', compact("areas", "departments", "extraInfo"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExtraInfo  $extraInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $extraInfo = ExtraInfo::findOrFail($id);

        $this->validation($request);

        $data = $request->except(["_token"]);
        $makeSlug = strtolower(str_replace(" ", "-", $request->title));
        $data["slug"] = $makeSlug;
        $extraInfo = $extraInfo->update($data);

        if ($extraInfo) {
            toastr()->success("ExtraInfo updated successfully");
            return redirect()->route('extra.index');
        }
        toastr()->error("Something went wrong");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExtraInfo  $extraInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extraInfo = ExtraInfo::findOrFail($id);

        $extraInfo->delete();
        toastr()->success("ExtraInfo deleted successfully");
        return back();
    }
    private function validation(Request $request)
    {
        $request->validate([
            "title" => "required",
            "department_id" => "required_if:area_id,null",
            "area_id" => "required_if:department_id,null",
            "for" => "required",
        ],[
            "department_id.required_if" => "The department field is required when area field is empty",
            "area_id.required_if" => "The area field is required when department field is empty",
            "for.required" => "Select for whom this data is"
        ]);
    }
}
