<?php

use App\Http\Controllers\Backend\ChangePassword;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\ForgetPasswordController;
use App\Http\Controllers\Backend\HospitalController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//  chace clear
Route::get('/cache/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    return to_route('admin.dashboard');
});
Route::group(['middleware' => 'localization'], function () {

    Route::get("/", [HomeController::class, "index"])->name("home");

    Route::get("/service/doctors", [HomeController::class, "serviceDoctors"])
        ->name("service.doctors");

    Route::get("service/{department}/doctors",[HomeController::class, "doctorsByDepartment"])->name('doctors.by.department');
    Route::get('service/{type}/all',[HomeController::class, "hospitalsByType"])->name('hospitals.by.type');
    Route::get("/service/location/{id}/doctors", [HomeController::class, "serviceLocationDoctors"])
        ->name("service.location.doctors");
    Route::get("/service/location/{id}/hospitals", [HomeController::class, "serviceLocationHospital"])
        ->name("service.location.hospitals");

    Route::get("/service/doctors/{slug}", [HomeController::class, "doctorDetails"])->name("service.doctor.details");
    Route::get("service/get-doctors/by-department/{id}", [HomeController::class, "getDoctorsByDepartment"])->name("get.doctors.by.department");
    Route::get("/service/hospitals", [HomeController::class, "serviceHospitals"])->name("service.hospitals");
    Route::get("/service/hospitals/{slug}", [HomeController::class, "hospitalDetails"])->name("service.hospital.details");
    Route::get("service/get-hospitals/by-type/", [HomeController::class, "getHospitalsByType"])->name("get.hospitals.by.type");
    Route::get('/switch-lang/{lang}', [HomeController::class, 'changeLanguage'])->name('switch.lang');

    Route::get("/about-us", [HomeController::class, "aboutUs"])->name("about_us");
    Route::group(["prefix" => "blogs"], function () {
        Route::get("/", [HomeController::class, "blogs"])->name("blogs");
        Route::get("/category-details/{slug}", [HomeController::class, "categoryDetails"])->name("category.details");

        Route::get("/post-details/{slug}", [HomeController::class, "postDetails"])->name("post.details");

        Route::get("/post/search", [HomeController::class, "postSearch"])->name("post.search");
    });

});
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/post', [LoginController::class, 'loginPost'])->name('login.post');

// Forget pass
Route::get('/forget/password', [ForgetPasswordController::class, 'forgetPassword'])->name('admin.forget.password');
Route::post('/forget/password/post', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('admin.forget.password.post');
Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('admin.reset.password');
Route::post('/reset-password/{token}', [ForgetPasswordController::class, 'resetPasswordPost'])->name('admin.reset.password.post');

Route::group(["prefix" => "admin", 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'list'])->name('user.list');
        Route::get('/view/{id}', [UserController::class, 'view'])->name('user.profile');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/block/{id}', [UserController::class, 'block'])->name('user.block');
        Route::get('/unblock/{id}', [UserController::class, 'unblock'])->name('user.unblock');
        Route::get('/change-password', [ChangePassword::class, 'changePassword'])->name('changePassword');
        Route::post('/change-password', [ChangePassword::class, 'changePasswordProcess'])->name('change.password.process');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingController::class, 'show'])->name('settings');
        Route::put('/update', [SettingController::class, 'settings'])->name('settings.update');
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.list');
        Route::get('/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('/store', [RoleController::class, 'store'])->name('role.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
    });
    Route::resource('/areas', LocationController::class);
    Route::get("/get-districts", [LocationController::class, "getDistricts"])->name("get.district");

    Route::resource("departments", DepartmentController::class);
    Route::resource("languages", LocalizationController::class);
    Route::resource("services", DepartmentController::class);

    Route::resource("doctors", DoctorController::class);
    Route::resource("hospitals", HospitalController::class);
    Route::get("doctors/get-districts/{id}", [DoctorController::class, "getDistricts"])->name("doctor.get_district");
    Route::get("doctors/get-upazilas/{id}", [DoctorController::class, "getAreas"])->name("doctor.get_areas");

    Route::resource("categories", CategoryController::class);
    Route::resource("posts", PostController::class);

});
