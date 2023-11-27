<?php
declare (strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data['total_user'] = User::where('role_id', '!=', "1")->count();

        $data['total_doctors'] = Doctor::count();
        $data['total_hospitals'] = Hospital::count();

        return view('backend.dashboard.index', compact('data'));
    }
}
