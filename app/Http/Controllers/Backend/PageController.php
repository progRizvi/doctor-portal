<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        $homeContent = HomePage::first();
        return view('backend.pages.pages.home-page', compact('homeContent'));
    }
    public function homePageUpdate(Request $request)
    {
        if ($request->hasFile('slider_image')) {
            if (file_exists(public_path('images/homepage/' . $request->slider_image))) {
                unlink(public_path('images/homepage/' . $request->slider_image));
            }
            $image = $request->file('slider_image');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images/homepage'), $imageName);
            $request['slider_image'] = $imageName;
        }

        $homeContent = HomePage::first();
        if ($homeContent) {
            $homeContent->update($request->except('_token'));
        } else {
            $request->validate([
                'slider_image' => 'required',
                'heading' => 'required',
                'sub_heading' => 'required',
                'cta_text' => 'required',
                'cta_url' => 'required',
            ]);
            $homeContent = HomePage::create($request->except('_token'));
        }

        notify()->success('Home Page Content Updated Successfully');
        return back()->with('success', 'Home Page Content Updated Successfully');
    }
}
