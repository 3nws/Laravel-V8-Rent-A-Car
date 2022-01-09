<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public static function categoryList(){
        return Category::where('parent_id', '=', 0)->where('status', 'True')->with(['children' => function ($query){
            $query->where('status', 'True');
        }])->get();
    }

    public static function getSettings(){
        return Setting::first();
    }

    public static function avgrate($id){
        return Comment::where('car_id', $id)->where('status', 'True')->average('rate');
    }

    public function index()
    {
        $setting = Setting::first();

//        $slider = Car::select('id', 'title', 'image', 'price', 'seats', 'large_bags', 'small_bags')->limit(3)->get();

        $slider = DB::select("SELECT * FROM cars WHERE status='True' LIMIT 3");

//        $featured = DB::table('cars')->inRandomOrder()->first();

        $featured = DB::select("SELECT cars.*, (SELECT COUNT(*) FROM comments WHERE comments.car_id = cars.id and comments.status='True') AS CNT FROM cars ORDER BY CNT DESC LIMIT 1")[0];

        $popular_cars = DB::select("SELECT cars.*, (SELECT COUNT(*) FROM comments WHERE comments.car_id = cars.id and comments.status='True') AS CNT FROM cars ORDER BY CNT DESC LIMIT 3");

        $num_of_cars = Car::where('status', 'True')->count();

        $data = [
            'setting' => $setting,
            'slider' => $slider,
            'page' => 'home',
            'featured' => $featured,
            'cars' => $popular_cars,
            'num_of_cars' => $num_of_cars,
        ];

        // same thing with return view('home.index', );
        return view('home.index', $data);
    }

    public function aboutus()
    {
        $setting = Setting::first();
        return view('home.about')->with('setting',$setting);
    }

    public function car($id)
    {
        $setting = Setting::first();
        $data = Car::find($id);
        $comments = Comment::where('car_id', $id)->where('status', 'True')->get();
        $category = $data->category;
        $car_images = DB::select("SELECT * FROM images WHERE car_id=$id");
        return view('home.car_detail',
            ['data' => $data, 'setting' => $setting,
            'comments' => $comments, 'category' => $category,
            'car_images' => $car_images]);
    }

    public function cars()
    {
        $setting = Setting::first();
        $datalist = Car::where('status', 'True')->get();
        return view('home.cars', ['datalist' => $datalist, 'setting' => $setting]);
    }

    public function get_car(Request $request)
    {
        $search = $request->input('search');

        $count = Car::where('title', 'like', '%'.$search.'%')->where('status', 'True')->get()->count();
        if ($count==1){
            $data = Car::where('title', 'like', '%'.$search.'%')->where('status', 'True')->first();
            return redirect()->route('car_detail', ['id' => $data->id]);
        }else{
            return redirect()->route('car_list', ['search' => $search]);
        }
    }

    public function car_list($search){
        $datalist = Car::where('title', 'like', '%'.$search.'%')->where('status', 'True')->get();
        $setting = Setting::first();
        return view('home.search_cars', ['search' => $search, 'datalist' => $datalist, 'setting' => $setting]);
    }

    public function category_cars($id)
    {
        $setting = Setting::first();
        $category = Category::find($id);
        $data = DB::select("SELECT * FROM cars WHERE status='True' and category_id=$id");
        return view('home.category_cars', ['data' => $data, 'category' => $category, 'setting' => $setting]);
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact')->with('setting',$setting);
    }

    public function sendmessage(Request $request)
    {
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->status = "New";
        $data->save();
        return redirect()->route('contact')->with('success', 'Message successfully sent.');
    }

    public function references()
    {
        $setting = Setting::first();
        return view('home.references')->with('setting',$setting);
    }

    public function faq()
    {
        $setting = Setting::first();
        $datalist = Faq::all();
        return view('home.faq',['setting' => $setting, 'datalist' => $datalist]);
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

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
