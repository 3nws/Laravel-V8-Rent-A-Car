<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public static function categoryList(){
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    public static function getSettings(){
        return Setting::first();
    }

    public function index()
    {
        $setting = Setting::first();
        // same thing with return view('home.index', ['setting' => $setting]);
        return view('home.index')->with('setting',$setting);
    }

    public function aboutus()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function references()
    {
        return view('home.references');
    }

    public function faq()
    {
        return view('home.faq');
    }

    public function login(){
        return view('admin.login');
    }

    public function logincheck(Request $request){
        if($request->isMethod('post')){
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)){
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }

            return back()->withErrors([
               'email' => 'The provided credentials do not match our records.',
            ]);

        }else{
            return view('admin.login');
        }
    }

    public function logout(){
        Auth::logout();
//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();

        return redirect('/');
    }

}
