<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\BloodDonation;
use App\Models\Category;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\ExtraInfo;
use App\Models\HomePage;
use App\Models\HomeService;
use App\Models\Hospital;
use App\Models\Post;
use App\Models\SurgerySupport;
use Carbon\Carbon;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $loc = session('loc');
        if (!$loc) {
            session()->put('loc', 'en');
        }
        $homeContent = HomePage::first();
        $topDoctors = Doctor::where('top_doctor', 1)->orderBy('serial')->orderBy('updated_at', 'desc')->get();
        $latestPost = Post::latest()->limit(4)->get();

        return view('frontend.pages.home', compact('homeContent', 'topDoctors', 'latestPost'));
    }
    public function serviceDoctors()
    {
        $doctors = Doctor::query();
        if (request()->search) {
            $doctors->where("name", "like", "%" . request()->search . "%");
        }

        $doctors = $doctors->with("area", "departments")->orderBy('serial')->orderBy('updated_at', 'desc')->paginate(20);

        $departments = Department::all();
        $extraInfoForDoctor = ExtraInfo::where('for', 'doctor')->whereNULL('area_id')->whereNULL('department_id')->orderBy('id', 'DESC')->first();
        $seoInfo = $extraInfoForDoctor;
        return view('frontend.pages.doctors-list', compact("doctors", "departments", 'extraInfoForDoctor', 'seoInfo'));
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
        $extraInfoForHospital = ExtraInfo::where('for', 'hospital')->whereNULL('area_id')->whereNULL('department_id')->orderBy('id', 'DESC')->first();
        $seoInfo = $extraInfoForHospital;
        return view('frontend.pages.hospital-list', compact("hospitals", "districts", "extraInfoForHospital", 'seoInfo'));
    }
    public function serviceLocationDoctors($slug)
    {

        $area = Area::with(['extraInfo' => function ($query) {
            $query->where('for', 'doctor')->first();
        }])->where("slug", $slug)->first();
        $doctors = Doctor::where("area_id", $area->id)
            ->with("area", "departments")
            ->orderBy('serial')
            ->orderBy('updated_at', 'desc')
            ->paginate(20);

        $departments = Department::all();
        $seoInfo = $area->extraInfo->first();
        return view('frontend.pages.doctors-list', compact("doctors", "departments", 'area', "seoInfo"));

    }
    public function doctorDetails($slug)
    {
        $doctor = Doctor::with("area", "departments")->where("slug", $slug)->orderBy('serial')
            ->orderBy('updated_at', 'desc')->first();

        // get related doctors by area and department
        $relatedDoctors = Doctor::where('area_id', $doctor->area_id)
            ->whereHas('departments', function ($query) use ($doctor) {
                $query->where('department_id', $doctor->departments->first()->id);
            })->where('id', '!=', $doctor->id)->orderBy('serial')
            ->orderBy('updated_at', 'desc')->limit(5)->get();

        return view('frontend.pages.doctor-details', compact("doctor", "relatedDoctors"));
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

        $departmentName = $request->departmentName;
        if ($department) {
            $pageNUm = 1;
            if ($request->page) {
                $pageNUm = $request->page;
            }

            $doctors = $department->doctors()->orderBy('serial')
                ->orderBy('updated_at', 'desc')->paginate(20, ['*'], 'page', $pageNUm);

            if ($doctors->count() > 0 && $request->ajax()) {
                return view('frontend.pages.doctor-result', compact('doctors', "departmentName"));
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
        $category = Category::where("slug", $slug)->first();
        return view('frontend.pages.blogs.index', compact('posts', "latestPosts", "categories", 'category'));
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
    public function doctorsByDepartment($slug)
    {
        $department = Department::with(['extraInfo' => function ($query) {
            $query->where('for', 'doctor')->first();
        }])->where("slug", $slug)->first();

        $doctors = $department->doctors()->orderBy('serial')
            ->orderBy('updated_at', 'desc')->paginate(20);
        $departments = Department::all();

        $seoInfo = $department->extraInfo->first();
        return view('frontend.pages.doctors-list', compact("doctors", "departments", "department", 'seoInfo'));

    }
    public function hospitalsByType($type)
    {
        $hospitals = Hospital::where("type", $type)->paginate(20);
        $locations = Division::with(['districts.areas'])->get();

        $districts = District::get();
        $seoInfo = ExtraInfo::where('for', 'hospital')->whereNULL('area_id')->whereNULL('department_id')->orderBy('id', 'DESC')->first();
        return view('frontend.pages.hospital-list', compact("hospitals", "districts", 'type', 'seoInfo'));
    }
    public function serviceLocationHospital($slug)
    {
        $area = Area::with(['extraInfo' => function ($query) {
            $query->where('for', 'hospital')->first();
        }])->where("slug", $slug)->first();
        $hospitals = Hospital::where("area_id", $area->id)->with("area")->paginate(20);
        $locations = Division::with(['districts.areas'])->get();

        $districts = District::get();
        $seoInfo = $area->extraInfo->first();
        return view('frontend.pages.hospital-list', compact("hospitals", "districts", 'area', 'seoInfo'));

    }
    public function surgerySupport()
    {
        $surgerySupports = SurgerySupport::paginate(20);
        $extraData = ExtraInfo::where('for', 'surgery')->orderBy('id', 'DESC')->first();
        return view('frontend.pages.surgery-support', compact('surgerySupports', 'extraData'));
    }

    public function homeServices()
    {
        $surgerySupports = HomeService::paginate(20);
        $extraData = ExtraInfo::where('for', 'homeService')->orderBy('id', 'DESC')->first();
        return view('frontend.pages.home-service', compact('surgerySupports', 'extraData'));
    }
    public function serviceLocationDepartmentDoctors(string $location, string $dpt)
    {
        // get area
        $area = Area::with(['extraInfo' => function ($query) {
            $query->where('for', 'doctor')->first();
        }])->where("slug", $location)->first();

        // get department
        $department = Department::with(['extraInfo' => function ($query) {
            $query->where('for', 'doctor')->first();
        }])->where("slug", $dpt)->first();
        $doctors = $department->doctors()->orderBy('serial')
            ->orderBy('updated_at', 'desc')->where('area_id', $area->id)->with("area", "departments")
            ->orderBy('serial')
            ->orderBy('updated_at', 'desc')->paginate(20);

        $departments = Department::all();
        $seoInfo = ExtraInfo::where('department_id', $department->id)->where('area_id', $area->id)->first();
        $seoInfo = $seoInfo ? $seoInfo : ($department->extraInfo->first() ? $department->extraInfo->first() : $area->extraInfo->first());
        return view('frontend.pages.doctors-list', compact("doctors", "departments", 'area', 'department', "seoInfo"));

    }
    public function serviceLocationHospitalType(string $area, string $type)
    {
        $area = Area::with(['extraInfo' => function ($query) {
            $query->where('for', 'hospital')->first();
        }])->where("slug", $area)->first();
        $hospitals = Hospital::where("area_id", $area->id)->where("type", $type)->with("area")->paginate(20);
        $locations = Division::with(['districts.areas'])->get();

        $districts = District::get();
        $seoInfo = ExtraInfo::whereNULL('department_id')->whereNULL('area_id')->first();
        $seoInfo = $area->extraInfo->first() ? $area->extraInfo->first() : $seoInfo;
        return view('frontend.pages.hospital-list', compact("hospitals", "districts", 'area', 'type', 'seoInfo'));

    }

    public function surgeryDetails($slug)
    {
        $data = SurgerySupport::where('slug', $slug)->first();
        $data->image = asset('uploads/surgery-support/' . $data->image);
        return view('frontend.pages.service-details', compact('data'));
    }
    public function homeServiceDetails($slug)
    {
        $data = HomeService::where('slug', $slug)->first();
        $data->image = asset('uploads/home-service/' . $data->image);
        return view('frontend.pages.service-details', compact('data'));
    }
    public function bloodClub()
    {
        $extraData = ExtraInfo::where('for', 'bloodClub')->orderBy('id', 'DESC')->first();
        $donars = BloodDonation::where('status', 'approved')->where('last_donation_date', '<', now()->subMonth(4))->orderBy('id', 'DESC')->paginate(20);
        $areas = Area::all();
        return view('frontend.pages.blood-club', compact('extraData', 'donars', 'areas'));
    }
    public function storeBloodDonation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'blood_group' => 'required',
            'phone' => 'required',
            'area_id' => 'required',
        ]);
        $data = $request->except('_token');
        $data['last_donation_date'] = Carbon::parse($request->last_donation_date)->format('Y-m-d');

        BloodDonation::create($data);
        session()->flash('success', 'Your request has been submitted successfully. We will contact you soon.');
        return redirect()->back()->with('success', 'Your request has been submitted successfully. We will contact you soon.');
    }
    public function getAllCity()
    {

        $cities = Area::with(['donars' => function ($query) {
            $query->where('status', 'approved');
        }])->where('name', 'like', '%' . request()->search . '%')->get();
        if (request()->group) {
            $cities = Area::with(['donars' => function ($query) {
                $query->where('status', 'approved')->where('blood_group', request()->group);
            }])->where('name', 'like', '%' . request()->search . '%')->get();
        }
        return response()->json($cities);
    }
    public function getBloodDonars(Request $request)
    {
        $group = $request->group;
        $donars = BloodDonation::where('status', 'approved')->where('blood_group', $group)->paginate(20);
        $areas = Area::all();
        $donarHtml = view('frontend.pages.blood-club-result', compact('donars', 'group'))->render();
        $areaHtml = view('frontend.pages.areas-result', compact('group', 'areas'))->render();
        return [
            'donarHtml' => $donarHtml,
            'areaHtml' => $areaHtml];
    }
    public function getBloodDonarsByCity(Request $request)
    {
        $donars = BloodDonation::query();

        if ($request->group) {
            $donars->where('blood_group', $request->group);
        }

        if ($request->city) {
            $donars->where('area_id', $request->city);
        }
        $donars = $donars->where('status', 'approved')->paginate(20);

        $areas = Area::all();
        $donarHtml = view('frontend.pages.blood-club-result', compact('donars'))->render();
        return [
            'donarHtml' => $donarHtml];
    }
}
