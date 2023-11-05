<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show()
    {
        $setting = Setting::first();
        return view('backend.settings.setting',compact('setting'));
    }

    public function settings(Request $request)
    {
        $request->validate([
                'name'                  =>  'required',
                'address'               =>  'required',
                'email'                 =>  'required', 
                'phone'                 =>  'required', 
           ]);
        try{
            $setting = Setting::find($request->id);
        if ($setting) {
            $filename = $request->logo;
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = date('Ymdhis').".".$file->getClientOriginalExtension();
                $file->storeAs('/setting',$filename);
            }
            $setting->update([
                'logo'                  =>  $filename,
                'company_name'          =>  $request->name,
                'address'               =>  $request->address,
                'email'                 =>  $request->email, 
                'phone_number'          =>  $request->phone, 
                'google_location'       =>  $request->google_location,
                'web_address'           =>  $request->web_address, 
                'facebook'              =>  $request->facebook, 
                'twitter'               =>  $request->twitter, 
                'instagram'             =>  $request->instagram, 
                'youtube'               =>  $request->youtube, 
                'tag_line'              =>  $request->tag_line, 
                'about_us'              =>  $request->about_us,
                'terms_and_conditions'  =>  $request->terms_and_conditions,
            ]);
            notify()->success('settings updated');
            return redirect()->back();
        }
        }catch(\Throwable $e){
            notify()->warning($e->getMessage());
            return redirect()->back(); 
        }
        
    }
}
