<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use App\Models\AdminAuth;

class AuthController extends Controller
{
    public function Login()
    {
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        if(session()->has('name') && session()->has('email')){
            return redirect()->route('dashboard');
        }else{
            return view('admin.login');
        }


    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $admin = AdminAuth::where('email',$request->email)->first();
        if($admin==true && Hash::check($request->password, $admin->password)){
            session()->put('name',$admin->name);
            session()->put('email',$admin->email);
            return redirect()->route('dashboard')->with('success','Login Success');
        }else{
            return redirect()->back()->with('error','Invalid User Information');
        }
    }

    public function Logout(Request $request)
    {
        $request->session()->forget('name');
        $request->session()->forget('email');
        return redirect()->route('login');
    }
}
