<?php

namespace App\Http\Controllers\Admin;

use App\Events\AdminRegisterEvent;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /**
     * Display Login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('backend.auth.login');
    }

    /**
     * Display Login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'exists:admins,email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('admin')->attempt($credentials) ) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors(['email' => 'Something is wrong !!']);
        }
    }

    /**
     * Display Backend Dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('backend.dashboard');
    }

    /**
     * Display Logout from Backend page.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('backend.auth.register');
    }

    /**
     * Display store register function.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $admin = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('admin.login');

        // event(new AdminRegisterEvent($admin));

        // Auth::login($admin);
        // return redirect(RouteServiceProvider::ADMIN_HOME);

    }


}
