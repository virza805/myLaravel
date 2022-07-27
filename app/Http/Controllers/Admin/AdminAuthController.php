<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return  $request->all();
    }


}
