<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomFacility;

class DashboardController extends Controller
{
    public function index() {
        $rooms = Room::all();
        $roomFacilitys = RoomFacility::all();
        return view('home',compact('roomFacilitys','rooms'));
    }
}
