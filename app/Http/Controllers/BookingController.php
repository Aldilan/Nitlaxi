<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomFacility;
use App\Models\Pemesanan;
use App\Models\Resepsionis;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index() {
        return back();
    }

    public function booking(Request $request) {
        $kamar = $request->ruangan;
        $checkIn = $request->tgl_check_in;
        $checkOut = $request->tgl_check_out;
        $roomz = Room::where('nama_kamar',$kamar)->get();
        $fasilitasId = $roomz[0]->fasilitas_id;
        $fasilitas = RoomFacility::where('id',$fasilitasId)->get();
        $rooms = Room::all();
        return view('booking',compact('kamar','checkIn','checkOut','roomz', 'fasilitas', 'rooms'));
    }

    public function createStruk(Request $request) {
        $validated = $request->validate([
            "pembayaran" => "required",
            "tipe_kamar" => "required",
            "nama_pemesan" => "required",
            "nama_tamu" => "required",
            "email" => "required",
            "nomor" => "required",
            "tgl_check_in" => "required",
            "tgl_check_out" => "required"
        ]);
        Pemesanan::create($validated);
        Resepsionis::create($validated);
        return redirect('/')->with('successNotif','Pemesanan kamar berhasil');
    }

    public function struk() {
        $struks = Pemesanan::where('nama_pemesan',Auth::user()->username)->get();
        $rooms = Room::all();
        return view('struk',compact('struks','rooms'));

    }
}
