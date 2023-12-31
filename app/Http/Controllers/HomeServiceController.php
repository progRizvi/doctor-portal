<?php

namespace App\Http\Controllers;

use App\Models\HomeService;
use Illuminate\Http\Request;

class HomeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeServices = HomeService::paginate(20);
        return view('backend.pages.home-service.index', compact('homeServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.home-service.create');
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
            $image->move(public_path("uploads/home-service"), $fileName);
            $data['image'] = $fileName;
        }

        HomeService::create($data);
        toastr()->success('Surgery Support Created Successfully');
        return redirect()->route('homeService.index')->with('success', 'Surgery Support Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeService  $homeService
     * @return \Illuminate\Http\Response
     */
    public function show(HomeService $homeService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeService  $homeService
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeService $homeService)
    {
        return view('backend.pages.home-service.edit', compact('homeService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeService  $homeService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeService $homeService)
    {
        $this->validateRequest($request);
        $data = $request->except('_token');
        if ($request->hasFile("image")) {
            if(file_exists(public_path("uploads/home-service/".$homeService->image))){
                unlink(public_path("uploads/home-service/".$homeService->image));
            }
            $image = $request->file("image");
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/home-service"), $fileName);
            $data['image'] = $fileName;
        }

        $homeService->update($data);
        toastr()->success('Surgery Support Updated Successfully');
        return redirect()->route('homeService.index')->with('success', 'Surgery Support Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeService  $homeService
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeService $homeService)
    {
        if(file_exists(public_path("uploads/home-service/".$homeService->image))){
            unlink(public_path("uploads/home-service/".$homeService->image));
        }
        $homeService->delete();
        toastr()->success('Surgery Support Deleted Successfully');
        return redirect()->route('homeService.index')->with('success', 'Surgery Support Deleted Successfully'); 
    }
    private function validateRequest(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'phone' => 'required',
        ]);
    }
}
