<?php

namespace App\Http\Controllers;

use App\Models\SurgerySupport;
use Illuminate\Http\Request;

class SurgerySupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surgeries = SurgerySupport::paginate(20);
        return view('backend.pages.surgery-support.index', compact('surgeries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.surgery-support.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $data = $request->except('_token');
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/surgery-support"), $fileName);
            $data['image'] = $fileName;
        }

        SurgerySupport::create($data);
        toastr()->success('Surgery Support Created Successfully');
        return redirect()->route('surgerySupport.index')->with('success', 'Surgery Support Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurgerySupport  $surgerySupport
     * @return \Illuminate\Http\Response
     */
    public function show(SurgerySupport $surgerySupport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurgerySupport  $surgerySupport
     * @return \Illuminate\Http\Response
     */
    public function edit(SurgerySupport $surgerySupport)
    {
        return view('backend.pages.surgery-support.edit', compact('surgerySupport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurgerySupport  $surgerySupport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurgerySupport $surgerySupport)
    {
        $this->validateRequest($request);
        $data = $request->except('_token');
        if ($request->hasFile("image")) {
            if (file_exists(public_path("uploads/surgery-support/" . $surgerySupport->image))) {
                unlink(public_path("uploads/surgery-support/" . $surgerySupport->image));
            }
            $image = $request->file("image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/surgery-support"), $fileName);
            $data['image'] = $fileName;
        }
        $surgerySupport->update($data);
        toastr()->success('Surgery Support Updated Successfully');
        return redirect()->route('surgerySupport.index')->with('success', 'Surgery Support Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurgerySupport  $surgerySupport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurgerySupport $surgerySupport)
    {
        if (file_exists(public_path("uploads/surgery-support/" . $surgerySupport->image))) {
            unlink(public_path("uploads/surgery-support/" . $surgerySupport->image));
        }
        $surgerySupport->delete();
        toastr()->success('Surgery Support Deleted Successfully');
        return redirect()->route('surgerySupport.index')->with('success', 'Surgery Support Deleted Successfully');
    }
    private function validateRequest(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'phone' => 'required',
        ]);
    }
}
