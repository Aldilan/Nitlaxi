<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resepsionis;

class ResepsionisController extends Controller
{
    public function index() {
        $resepsionis = Resepsionis::all();
        $i = 1;
        return view('dashboard/resepsionis',compact('resepsionis','i'));
    }
}
