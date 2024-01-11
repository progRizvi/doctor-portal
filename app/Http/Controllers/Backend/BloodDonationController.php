<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\BloodDonation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BloodDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = BloodDonation::query();
        if(request()->search){
            $donors = $donors->where('name', 'like', '%'.request()->search.'%')
            ->orWhere('phone', 'like', '%'.request()->search.'%')
            ->orWhere('email', 'like', '%'.request()->search.'%')
            ->orWhere('address', 'like', '%'.request()->search.'%')
            ->orWhere('blood_group', 'like', '%'.request()->search.'%')
            ->orWhere('status', 'like', '%'.request()->search.'%')
            ->orWhere('area_id',function($query){
                $query->select('id')->from('areas')->where('name', 'like', '%'.request()->search.'%');
            });
        }
        $donars = $donors->orderBy('id', 'desc')->paginate(10);

        return view('backend.pages.donars.index', compact('donars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::orderBy('name', 'asc')->get();
        return view('backend.pages.donars.create', compact('areas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            "phone" => "required|unique:blood_donations,phone",
            "address" => "required",
            "area_id" => "required",
            "gender" => "required",
            "status" => "required",
            "blood_group" => "required",
        ]);

        $data = $request->except('_token');
        $data['last_donation_date'] = Carbon::parse($request->last_donation_date)->format('Y-m-d');

        $donation = BloodDonation::create($data);
        if ($donation) {
            notify()->success('Donar created successfully');
            return redirect()->route('donars.index')->with('success', 'Donar created successfully');
        } else {
            notify()->error('Donar creation failed');
            return redirect()->back()->with('error', 'Donar creation failed');
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
        $donar = BloodDonation::findOrFail($id);
        $areas= Area::orderBy('name', 'asc')->get();
        return view('backend.pages.donars.edit',compact('donar','areas'));
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
        $donar = BloodDonation::findOrFail($id);
        $request->validate([
            'name' => 'required',
            "phone" => "required|unique:blood_donations,phone," . $id,
            "address" => "required",
            "area_id" => "required",
            "gender" => "required",
            "status" => "required",
            "blood_group" => "required",
        ]);
        $data = $request->except('_token');
        $data['last_donation_date'] = Carbon::parse($request->last_donation_date)->format('Y-m-d');

        $donation = $donar->update($data);
        if ($donation) {
            notify()->success('Donar updated successfully');
            return redirect()->route('donars.index')->with('success', 'Donar updated successfully');
        } else {
            notify()->error('Donar update failed');
            return redirect()->back()->with('error', 'Donar update failed');
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
        $donar = BloodDonation::findOrFail($id);
        $donar->delete();
        notify()->success('Donar deleted successfully');
        return redirect()->back()->with('success', 'Donar deleted successfully');
    }
}
