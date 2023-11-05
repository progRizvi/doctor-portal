<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('frontend.pages.home');
    }
    public function serviceDoctors()
    {
        $doctors = Doctor::query();
        if (request()->search) {
            $doctors->where("name", "like", "%" . request()->search . "%");
        }

        $doctors = $doctors->with("area", "departments")->paginate(20);
        $departments = Department::all();
        return view('frontend.pages.doctors-list', compact("doctors", "departments"));
    }
    public function doctorDetails($slug)
    {
        $doctor = Doctor::with("area", "departments")->where("slug", $slug)->first();
        return view('frontend.pages.doctor-details', compact("doctor"));
    }
    public function postSearch()
    {
        $search = request()->search;
        $posts = Post::where('title', 'like', "%$search%")->paginate(10);
        return view('frontend.pages.categoryDetails', compact('posts'));
    }
    public function getDoctorsByDepartment(Request $request, $id)
    {
        $department = Department::find($id);

        if ($department) {
            $pageNUm = 1;
            if ($request->page) {
                $pageNUm = $request->page;
            }

            $doctors = $department->doctors()->paginate(20, ['*'], 'page', $pageNUm);
            if ($doctors->count() > 0 && $request->ajax()) {
                return view('frontend.pages.doctor-result', compact('doctors'));
            } else {
                return view('frontend.pages.no-data-found');
            }
        }

    }
}
