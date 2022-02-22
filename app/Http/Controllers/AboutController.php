<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AboutController extends Controller
{
    public function index() {
        $rooms = Room::all();
        return view('about',compact('rooms'));
    }
}
