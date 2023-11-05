<?php
declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function loginPost(Request $request): RedirectResponse
    {
        try {
            $user_input = $request->only('email','password');
            if (Auth::attempt($user_input)) {
                notify()->success('Login Successful.');
                return redirect()->route('admin.dashboard');
            }
            notify()->error('Invalid email or password');
            return redirect()->back();
        }catch (\Throwable $exception)
        {
            notify()->error($exception->getMessage());
            return redirect()->back();
        }

    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        notify()->success('Logout Successful.');
        return redirect()->route('login');
    }
}
