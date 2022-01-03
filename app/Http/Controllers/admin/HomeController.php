<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $datalist1 = DB::select("SELECT * FROM reservations WHERE status != 'Canceled'");
        $datalist2 = Message::where('status', 'New')->get();
        $total_earnings = 0;
        foreach ($datalist1 as $rs){
            $total_earnings += $rs->price * $rs->days;
        }
        $pending_messages = 0;
        foreach ($datalist2 as $rs){
            $pending_messages += 1;
        }
        return view('./admin/index', ['total_earnings' => $total_earnings, 'pending_messages' => $pending_messages]);
    }
}
