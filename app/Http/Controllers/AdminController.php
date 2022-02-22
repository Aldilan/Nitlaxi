<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\RoomFacility;
use App\Models\HotelFacility;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function index() {
        $countUser = User::all()->count();
        $users = User::all();
        $countRoom = Room::all()->count();
        $rooms = Room::all();
        $countRoomFacility = RoomFacility::all()->count();
        $roomFacilitys = RoomFacility::all();
        $countHotelFacility = HotelFacility::all()->count();
        $hotelFacilitys = HotelFacility::all();
        $i = 1;
        return view('dashboard/admin',compact('countUser', 'users', 'countRoom', 'rooms','countRoomFacility', 'roomFacilitys', 'countHotelFacility', 'hotelFacilitys','i'));
    }

    public function tambahUser(Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:2|max:20|unique:user',
            'namaDepan' => 'required|max:30',
            'namaBelakang' => 'required|max:30',
            'email' => 'required|email:dns|max:25|unique:user',
            'nomor' => 'required|min:10|max:14|unique:user',
            'password' => 'required|min:6|max:20',
            'passwordConfirm' => 'required|min:6|max:20',
            'role' => 'required'
        ]);
        $name = $validated['namaDepan'] .' '. $validated['namaBelakang'];

        if ($validated['password'] == $validated['passwordConfirm']) {
            $validated['password'] = bcrypt($validated['password']);

            User::create([
                'name' => $name,
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'nomor' => $validated['nomor'],
                'role' => $validated['role'],
            ]);
            return redirect('/admin')->with('successNotif','Akun berhasil dibuat.');
        }else{
            return redirect('/admin')->with('failNotif', 'Password yang anda masukkan tidak sama.');
        }
    }

    public function tambahKamar(Request $request) {
        $validated = $request->validate([
            'nama_kamar' => 'required',
            'jumlah_kamar' => 'required',
            'fasilitas_id' => 'required',
            'harga' => 'required',
            'foto' => 'required|image'
        ]);

        $validated['foto'] = $request->file('foto')->store('room');
        
        Room::create($validated);
        return redirect('/admin')->with('successNotif','Kamar berhasil dibuat.');
    }

    public function tambahFasilitasKamar(Request $request) {
        $validated = $request->validate([
            'fasilitas' => 'required',
            'luas_kamar1' => 'required',
            'luas_kamar2' => 'required'
        ]);

        $luas_kamar = $validated['luas_kamar1'].'x'.$validated['luas_kamar2'].' meter';
        RoomFacility::create([
            'fasilitas' => $validated['fasilitas'],
            'luas_kamar' => $luas_kamar
        ]);
        return redirect('/admin')->with('successNotif','Fasilitas kamar berhasil dibuat.');
    }

    public function tambahFasilitasHotel(Request $request) {
        $validated = $request->validate([
            'fasilitas' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image'
        ]);

        $validated['foto'] = $request->file('foto')->store('fasilitasHotel');

        HotelFacility::create($validated);
        return redirect('/admin')->with('successNotif','Fasilitas hotel berhasil dibuat.');
    }

    public function editUser(Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:2|max:20',
            'name' => 'required|max:50',
            'email' => 'required|email:dns|max:25',
            'nomor' => 'required|min:10|max:14',
            'password' => 'required|min:6|max:20',
            'passwordConfirm' => 'required|min:6|max:20',
            'role' => 'required'
        ]);

        if ($validated['password'] == $validated['passwordConfirm']) {
            $validated['password'] = bcrypt($validated['password']);
            $data = User::find($request['id']);
            $data->update($validated);
            return redirect('/admin')->with('successNotif','Akun berhasil diubah.');
        }else{
            return redirect('/admin')->with('failNotif', 'Password yang anda masukkan tidak sama.');
        }
    }

    public function editRoom(Request $request) {

        if ($request['foto']) {
            $validated = $request->validate([
                'nama_kamar' => 'required',
                'jumlah_kamar' => 'required',
                'fasilitas_id' => 'required',
                'harga' => 'required',
                'foto' => 'required'
            ]);
            $data = Room::find($request['id']);
            $validated['foto'] = $request->file('foto')->store('room');
            $data->update($validated);
            return redirect('/admin')->with('successNotif','Kamar berhasil diubah.');
        }
        
        $validated = $request->validate([
            'nama_kamar' => 'required',
            'jumlah_kamar' => 'required',
            'fasilitas_id' => 'required',
            'harga' => 'required'
        ]);

        $data = Room::find($request['id']);
        $data->update($validated);
        return redirect('/admin')->with('successNotif','Kamar berhasil diubah.');
    }

    public function editRoomFacility(Request $request) {
        $validated = $request->validate([
            'fasilitas' => 'required',
            'luas_kamar' => 'required'
        ]);
        
        $data = RoomFacility::find($request['id']);
        $data->update($validated);
        return redirect('/admin')->with('successNotif','Fasilitas kamar berhasil diubah.');
    }

    public function editHotelFacility(Request $request) {
        if ($request->file('foto')) {
            $validated = $request->validate([
                'fasilitas' => 'required',
                'keterangan' => 'required',
                'foto' => 'required'
            ]);
            $validated['foto'] = $request->file('foto')->store('fasilitasHotel');
            $data = HotelFacility::find($request['id']);
            $data->update($validated);
            return redirect('/admin')->with('successNotif','Fasilitas hotel berhasil diubah.');
        }
        $validated = $request->validate([
            'fasilitas' => 'required',
            'keterangan' => 'required'
        ]);
        
        $data = HotelFacility::find($request['id']);
        $data->update($validated);
        return redirect('/admin')->with('successNotif','Fasilitas hotel berhasil diubah.');
    }

    public function deleteUser($id) {
        $data = User::find($id);
        $data->delete();
        return redirect('/admin')->with('successNotif','Akun berhasil dihapus.');
    }

    public function deleteRoom($id) {
        $data = Room::find($id);
        $data->delete();
        return redirect('/admin')->with('successNotif','Kamar berhasil dihapus.');
    }

    public function deleteRoomFacility($id) {
        $data = RoomFacility::find($id);
        $data->delete();
        return redirect('/admin')->with('successNotif','Fasilitas kamar berhasil dihapus.');
    }

    public function deleteHotelFacility($id) {
        $data = HotelFacility::find($id);
        $data->delete();
        return redirect('/admin')->with('successNotif','Fasilitas hotel berhasil dihapus.');
    }
}
