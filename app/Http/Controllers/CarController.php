<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = Car::where('user_id', Auth::id())->get();
        $setting = Setting::first();
        return view('home.user_car', ['datalist' => $datalist, 'setting' => $setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datalist = Category::with('children')->get();
        $setting = Setting::first();
        return view('home.user_car_add', ['datalist' => $datalist, 'setting' => $setting]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Car;
        $data->category_id = $request->input('category_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        if ($request->file('image')){
            $data->image = Storage::putFile('images', $request->file('image')); // file upload
        }
        $data->status = "False";
        $data->price = $request->input('price');
        $data->seats = $request->input('seats');
        $data->large_bags = $request->input('large_bags');
        $data->small_bags = $request->input('small_bags');
        $data->detail = $request->input('detail');
        $data->user_id = Auth::id();
        $data->save();

        return redirect()->route('user_car')->with('success', 'Car created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car, $id)
    {
        $data = Car::find($id);
        $datalist = Category::with('children')->get();
        return view('home.user_car_edit', ['data' => $data, 'datalist' => $datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car, $id)
    {
        $data = Car::find($id);
        $data->category_id = $request->input('category_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        if ($request->file('image')){
            $data->image = Storage::putFile('images', $request->file('image')); // file upload
        }
        $data->price = $request->input('price');
        $data->seats = $request->input('seats');
        $data->large_bags = $request->input('large_bags');
        $data->small_bags = $request->input('small_bags');
        $data->detail = $request->input('detail');
        $data->user_id = Auth::id();
        $data->save();

        return redirect()->route('user_car')->with('success', 'Car updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car, $id)
    {
        $data = Car::find($id);
        $data->delete();

        return redirect()->route('user_car')->with('success', 'Car deleted.');
    }
}
