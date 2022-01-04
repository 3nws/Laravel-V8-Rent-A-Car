<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $datalist = Reservation::all();
        return view('admin.reservation', ['datalist' => $datalist]);
    }

    public function index_w_status($status)
    {
        $datalist = Reservation::where('status', $status)->get();
        return view('admin.reservation', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($car_id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $car_id)
    {
        //
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
        return view('admin.edit_reservation', ['setting' => $setting, 'data' => $data, 'car' => $car]);
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
        $data->status = $request->input('status');
        $data->note = $request->input('note');
        if ($days < 1){
            return back()->with('error', 'Pick valid dates, please.');
        }else{
            $data->days = $days;
        }
        $data->save();

        return redirect()->route('admin_all_reservation')->with('success', 'Reservation updated.');
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
        $data->status = "Cancelled";
        $data->save();

        return redirect()->route('admin_all_reservation')->with('success','Reservation cancelled.');
    }
}
