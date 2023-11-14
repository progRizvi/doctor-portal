<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Category;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Post;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
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
    public function serviceHospitals()
    {
        $hospitals = Hospital::query();

        if (request()->search) {
            $hospitals->where("name", "like", "%" . request()->search . "%");
        }
        $hospitals = $hospitals->with("area")->paginate(20);
        $locations = Division::with(['districts.areas'])->get();

        $districts = District::get();

        return view('frontend.pages.hospital-list', compact("hospitals", "districts"));
    }
    public function serviceLocationDoctors($id)
    {
        $doctors = Doctor::where("area_id", $id)->with("area", "departments")->paginate(20);
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
    public function getHospitalsByType(Request $request)
    {
        $hospitalsQuery = Hospital::query();
        if ($request->type) {
            $hospitalsQuery->where("type", $request->type);
        }
        if ($request->district) {
            $areas = Area::where("district_id", $request->district)->pluck("id");
            $hospitalsQuery->whereIn("area_id", $areas);
        }
        $pageNUm = 1;
        if ($request->page) {
            $pageNUm = $request->page;
        }
        $hospitals = $hospitalsQuery->with("area")->paginate(20, ['*'], 'page', $pageNUm);

        if ($hospitals->total() > 0 && $request->ajax()) {
            return view('frontend.pages.hospital-result', compact('hospitals'));
        } else {
            return view('frontend.pages.no-data-found');
        }
    }
    public function hospitalDetails($slug)
    {
        $hospital = Hospital::with("area")->where("slug", $slug)->first();
        return view('frontend.pages.hospital-details', compact("hospital"));
    }
    public function blogs()
    {
        $posts = Post::query();
        if (request()->search) {
            $posts = $posts->where('title', 'like', "%" . request()->search . "%")->orWhere('content', 'like', "%" . request()->search . "%");
        }
        $posts = $posts->paginate(10);

        $latestPosts = Post::latest()->orderBy("id", "DESC")->take(5)->get();
        $categories = Category::all();
        return view('frontend.pages.blogs.index', compact('posts', "latestPosts", "categories"));
    }
    public function categoryDetails(string $slug)
    {
        $posts = Post::whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->paginate(10);

        $latestPosts = Post::latest()->orderBy("id", "DESC")->take(5)->get();
        $categories = Category::all();
        return view('frontend.pages.blogs.index', compact('posts', "latestPosts", "categories"));
    }
    public function postDetails(string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $latestPosts = Post::latest()->orderBy("id", "DESC")->take(5)->get();
        $categories = Category::all();
        return view('frontend.pages.blogs.details', compact('post', "latestPosts", "categories"));
    }
    public function hospital()
    {
        return view('frontend.pages.hospital-list');
    }
    public function aboutUs()
    {
        return view('frontend.pages.about-us');
    }
    public function changeLanguage($lang)
    {
        session()->put('loc', $lang);
        return redirect()->back();
    }
}
