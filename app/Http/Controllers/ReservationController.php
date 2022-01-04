<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        $datalist = Reservation::where('user_id', Auth::id())->get();
        return view('home.reservation', ['datalist' => $datalist, 'setting' => $setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($car_id)
    {
        $setting = Setting::first();
        $car = Car::find($car_id);
        return view('home.make_reservation', ['car_id' => $car_id, 'setting' => $setting, 'car' => $car]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $car_id)
    {
        $data = new Reservation;
        $car = Car::find($car_id);
        if ($request->input('resdate')){
            $data->rezdate = $request->input('resdate');
        }else{
            $data->rezdate = Carbon::now()->toDateString();
        }
        $data->reztime = $request->input('restime');
        $data->returndate = $request->input('returndate');
        $data->returntime = $request->input('returntime');
        $data->price = $car->price;
        $start = Carbon::parse($data->rezdate);
        $end = Carbon::parse($data->returndate);
        $data->ip = $_SERVER['REMOTE_ADDR'];
        $days = $start->diffInDays($end, false);
        if ($days < 1){
            return back()->with('error', 'Pick valid dates, please.');
        }else{
            $data->days = $days;
        }
        $data->user_id = Auth::id();
        $data->car_id = $car_id;
        $data->status = "New";
        $data->save();

        return redirect()->route('user_reservation')->with('success', 'Reservation made.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation, $id, $car_id)
    {
        $setting = Setting::first();
        $data = Reservation::find($id);
        $car = Car::find($car_id);
        return view('home.edit_reservation', ['setting' => $setting, 'data' => $data, 'car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation, $id)
    {
        $data = Reservation::find($id);
        if ($request->input('resdate')){
            $data->rezdate = $request->input('resdate');
        }else{
            $data->rezdate = Carbon::now()->toDateString();
        }
        $data->reztime = $request->input('restime');
        $data->returndate = $request->input('returndate');
        $data->returntime = $request->input('returntime');
        $start = Carbon::parse($data->rezdate);
        $end = Carbon::parse($data->returndate);
        $days = $start->diffInDays($end, false);
        if ($days < 1){
            return back()->with('error', 'Pick valid dates, please.');
        }else{
            $data->days = $days;
        }
        $data->save();

        return redirect()->route('user_reservation')->with('success', 'Reservation updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation, $id)
    {
        $data = Reservation::find($id);
        $data->status = "Canceled";
        $data->save();

        return redirect()->route('user_reservation')->with('success','Reservation canceled.');
    }
}
