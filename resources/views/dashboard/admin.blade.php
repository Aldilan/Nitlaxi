<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/dashboard/admin.css">
    <title>Nitlaxi | Admin</title>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <div class="headerSidebar">
            <h1> Nitlaxi Admin</h1>
            <a href=""><img src="/img/icon/arrow.png" alt=""></a>
        </div>
        <div class="menuSidebar">
            <div class="sidebarLeft">
                <ul>
                    <li><a href="" class="active">Dashboard</a></li>
                    <li><a href="">User</a></li>
                    <li><a href="">Room</a></li>
                    <li><a href="">Room Facilities</a></li>
                    <li><a href="">Hotel Facilities</a></li>
                </ul>
            </div>
            <div class="sidebarRight">
                <ul>
                    <li><a href=""><img src="/img/icon/home.png" alt=""></a></li>
                    <li><a href=""><img src="/img/icon/profile.png" alt=""></a></li>
                    <li><a href=""><img src="/img/icon/door.png" alt=""></a></li>
                    <li><a href=""><img src="/img/icon/bed.png" alt=""></a></li>
                    <li><a href=""><img src="/img/icon/swing.png" alt=""></a></li>
                </ul>
            </div>
        </div>
        <div class="footerSidebar">
            <small>Nitlaxi 2022</small>
        </div>
    </div>
    <div class="contain">
        <div class="homeContain">
            <h1>Dashboard Admin</h1>
            <span class="dropdownProfileLink">{{Auth::user()->username}}</span>
        </div>
        <div class="dropdownProfile displayNone">
            <ul>
                <li><a href="/">Home</a></li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button>Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="GNQContain">
            <h1 id="greeting"></h1>
            <small id="quote"></small>
        </div>
            @if(session()->has('successNotif'))
                <div class="successNotif" id="notif">
                    <span>{{ session('successNotif') }}</span>
                    <button id="closeNotif">X</button>
                </div>
            @elseif(session()->has('failNotif'))
                <div class="failNotif" id="notif">
                    <span>{{ session('failNotif') }}</span>
                    <button id="closeNotif">X</button>
                </div>
            @endif
            <input type="hidden" id="notif">
            <input type="hidden" id="closeNotif">
        <div class="cardContain">
            <img src="/img/icon/profile.png" alt="">
            <h1>Pengguna Aktif</h1>
            <p>{{$countUser}} pengguna</p>
            <a href=""><small id="detailProfile">Lihat Detail</small></a>
        </div>
        <div class="cardContain">
            <img src="/img/icon/door.png" alt="">
            <h1>Banyak Ruangan</h1>
            <p>{{$countRoom}} ruangan</p>
            <a href=""><small id="detailRoom">Lihat Detail</small></a>
        </div>
        <div class="cardContain">
            <img src="/img/icon/bed.png" alt="">
            <h1>Tipe Fasilitas Kamar</h1>
            <p>{{$countRoomFacility}} tipe</p>
            <a href=""><small id="detailRoomFacility">Lihat Detail</small></a>
        </div>
        <div class="cardContain">
            <img src="/img/icon/swing.png" alt="">
            <h1>Banyak Fasilitas Hotel</h1>
            <p>{{$countHotelFacility}} fasilitas</p>
            <a href=""><small id="detailHotelFacility">Lihat Detail</small></a>
        </div>
        <div class="tableUser dataTable displayNone">
            <h1>Tabel User</h1>
            <small><a href="" class="tambahDataLink">Tambah user baru</a>
            <table>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Nomor</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->nomor}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a href="" class="editDataLink" id="editUser{{$user->id}}">Edit</a>
                            | 
                        <a href="/admin/deleteUser/{{$user->id}}" id="deleteData">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="tableRoom dataTable displayNone">
            <h1>Tabel Kamar</h1>
            <small><a href="" class="tambahDataLink">Tambah kamar baru</a>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Kamar</th>
                    <th>Jumlah Kamar</th>
                    <th>Fasilitas Id</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
                @foreach($rooms as $room)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$room->nama_kamar}}</td>
                    <td>{{$room->jumlah_kamar}}</td>
                    <td>{{$room->fasilitas_id}}</td>
                    <td>{{$room->harga}}</td>
                    <td><img src="/storage/{{$room->foto}}" alt=""></td>
                    <td>
                        <a href="" class="editDataLink" id="editRoom{{$room->id}}">Edit</a>
                            | 
                        <a href="/admin/deleteRoom/{{$room->id}}" id="deleteData">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="tableRoomFacility dataTable displayNone">
            <h1>Tabel Fasilitas Kamar</h1>
            <small><a href="" class="tambahDataLink">Tambah fasilitas kamar baru</a>
            <table>
                <tr>
                    <th>No</th>
                    <th>Fasilitas</th>
                    <th>Luas Kamar</th>
                    <th>Action</th>
                </tr>
                @foreach($roomFacilitys as $roomFacility)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$roomFacility->fasilitas}}</td>
                    <td>{{$roomFacility->luas_kamar}}</td>
                    <td>
                        <a href="" class="editDataLink" id="editRoomFacility{{$roomFacility->id}}">Edit</a>
                            | 
                        <a href="/admin/deleteRoomFacility/{{$roomFacility->id}}" id="deleteData">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="tableHotelFacility dataTable displayNone">
            <h1>Tabel Fasilitas Hotel</h1>
            <small><a href="" class="tambahDataLink">Tambah fasilitas hotel baru</a>
            <table>
                <tr>
                    <th>No</th>
                    <th>Fasilitas</th>
                    <th>Keterangan</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
                @foreach($hotelFacilitys as $hotelFacility)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$hotelFacility->fasilitas}}</td>
                    <td>{{$hotelFacility->keterangan}}</td>
                    <td><img src="/storage/{{$hotelFacility->foto}}" alt=""></td>
                    <td>
                        <a href="" class="editDataLink" id="editHotelFacility{{$hotelFacility->id}}">Edit</a>
                            | 
                        <a href="/admin/deleteHotelFacility/{{$hotelFacility->id}}" id="deleteData">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="tambahUser tambahData displayNone">
           <h1>Tambah User Baru</h1>
           <form action="admin/tambahUser" method="post">
            @csrf
           <table>
               <tr>
                   <td><label for="namaDepan">Masukkan nama depan</label></td>
                   <td><input type="text" name="namaDepan" id="namaDepan" placeholder="{{$errors->has('namaDepan') ? $errors->first('namaDepan') : '' }}" required></td>
               </tr>
               <tr>
                   <td><label for="namaBelakang">Masukkan nama belakang</label></td>
                   <td><input type="text" name="namaBelakang" id="namaBelakang" placeholder="{{$errors->has('namaBelakang') ? $errors->first('namaBelakang') : '' }}" required></td>
               </tr>
               <tr>
                   <td><label for="email">Masukkan email</label></td>
                   <td><input type="email" name="email" id="email" placeholder="{{$errors->has('email') ? $errors->first('email') : '' }}" required></td>
               </tr>
               <tr>
                   <td><label for="username">Masukkan username</label></td>
                   <td><input type="text" name="username" id="username" placeholder="{{$errors->has('username') ? $errors->first('username') : '' }}" required></td>
               </tr>
               <tr>
                   <td><label for="password">Masukkan password</label></td>
                   <td><input type="password" name="password" id="password" placeholder="{{$errors->has('password') ? $errors->first('password') : '' }}" required></td>
               </tr>
               <tr>
                   <td><label for="passwordConfirm">Konfirmasi password</label></td>
                   <td><input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="{{$errors->has('passwordConfirm') ? $errors->first('passwordConfirm') : '' }}" required></td>
               </tr>
               <tr>
                   <td><label for="nomor">Masukkan nomor</label></td>
                   <td><input type="number" name="nomor" id="nomor" placeholder="{{$errors->has('nomor') ? $errors->first('nomor') : '' }}" required></td>
               </tr>
               <tr>
                   <td><label for="role">Pilih posisi</label></td>
                   <td>
                       <ul>
                           <li><input type="radio" name="role" id="role" value="admin" required>Admin</li>
                           <li><input type="radio" name="role" id="role" value="resepsionis" required>Resepsionis</li>
                       </ul>
                   </td>
               </tr>
               <tr>
                   <td></td>
                   <td><button type="submit" class="redButton">BUAT</button></td>
               </tr>
           </table>
           </form>
        </div>
        <div class="tambahKamar tambahData displayNone">
           <h1>Tambah Kamar Baru</h1>
           <form action="admin/tambahKamar" method="post" enctype="multipart/form-data">
            @csrf
           <table>
               <tr>
                   <td><label for="nama_kamar">Masukkan nama kamar</label></td>
                   <td><input type="text" name="nama_kamar" id="nama_kamar" required></td>
               </tr>
               <tr>
                   <td><label for="jumlah_kamar">Masukkan jumlah kamar</label></td>
                   <td><input type="number" name="jumlah_kamar" id="jumlah_kamar" required></td>
               </tr>
               <tr>
                   <td><label for="fasilitas_id">Pilih fasilitas</label></td>
                   <td>
                       <select name="fasilitas_id" id="fasilitas_id" required>
                           @foreach($roomFacilitys as $roomFacility)
                           <option value="{{$roomFacility->id}}">{{$roomFacility->fasilitas}}</option>
                           @endforeach
                       </select>
                   </td>
               </tr>
               <tr>
                   <td><label for="harga">Masukkan harga</label></td>
                   <td><input type="number" name="harga" id="harga" required></td>
               </tr>
               <tr>
                   <td><label for="foto">Masukkan foto</label></td>
                   <td><input type="file" name="foto" id="foto" required></td>
               </tr>
               <tr>
                   <td></td>
                   <td><button type="submit" class="redButton">BUAT</button></td>
               </tr>
           </table>
           </form>
        </div>
        <div class="tambahFasilitasKamar tambahData displayNone">
           <h1>Tambah Fasilitas Kamar Baru</h1>
           <form action="admin/tambahFasilitasKamar" method="post">
            @csrf
           <table>
               <tr>
                   <td><label for="fasilitas">Masukkan fasilitas kamar</label></td>
                   <td><textarea name="fasilitas" id="fasilitas" cols="15" rows="5" required></textarea></td>
               </tr>
               <tr>
                   <td><label for="luas_kamar">Masukkan luas kamar</label></td>
                   <td><input type="number" name="luas_kamar1" id="luas_kamar" required>X<input type="number" name="luas_kamar2" id="luas_kamar" required>meter</td>
               </tr>
               <tr>
                   <td></td>
                   <td><button type="submit" class="redButton">BUAT</button></td>
               </tr>
           </table>
           </form>
        </div>
        <div class="tambahFasilitasHotel tambahData displayNone">
           <h1>Tambah Fasilitas Hotel Baru</h1>
           <form action="admin/tambahFasilitasHotel" method="post" enctype="multipart/form-data">
            @csrf
           <table>
               <tr>
                   <td><label for="fasilitas_hotel">Masukkan nama fasilitas hotel</label></td>
                   <td><input type="text" name="fasilitas" id="fasilitas_hotel" required></td>
               </tr>
               <tr>
                   <td><label for="keterangan">Masukkan keterangan fasilitas hotel</label></td>
                   <td><textarea name="keterangan" id="keterangan" cols="15" rows="5" required></textarea></td>
               </tr>
               <tr>
                   <td><label for="foto">Masukkan foto</label></td>
                   <td><input type="file" name="foto" id="foto" required></td>
               </tr>
               <tr>
                   <td></td>
                   <td><button type="submit" class="redButton">BUAT</button></td>
               </tr>
           </table>
           </form>
        </div>

        @foreach($users as $user)
        <div class="editUser editData displayNone" id="editUser{{$user->id}}">
           <h1>Edit User</h1>
           <form action="/admin/editUser" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
           <table>
               <tr>
                   <td><label for="name">Masukkan nama</label></td>
                   <td><input type="text" name="name" id="name" placeholder="{{$errors->has('name') ? $errors->first('name') : '' }}" value="{{$user->name}}" required></td>
               </tr>
               <tr>
                   <td><label for="email">Masukkan email</label></td>
                   <td><input type="email" name="email" id="email" placeholder="{{$errors->has('email') ? $errors->first('email') : '' }}" value="{{$user->email}}" required></td>
               </tr>
               <tr>
                   <td><label for="username">Masukkan username</label></td>
                   <td><input type="text" name="username" id="username" placeholder="{{$errors->has('username') ? $errors->first('username') : '' }}" value="{{$user->username}}" required></td>
               </tr>
               <tr>
                   <td><label for="password">Masukkan password</label></td>
                   <td><input type="password" name="password" id="password" placeholder="{{$errors->has('password') ? $errors->first('password') : '' }}" required></td>
               </tr>
               <tr>
                   <td><label for="passwordConfirm">Konfirmasi password</label></td>
                   <td><input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="{{$errors->has('passwordConfirm') ? $errors->first('passwordConfirm') : '' }}" required></td>
               </tr>
               <tr>
                   <td><label for="nomor">Masukkan nomor</label></td>
                   <td><input type="number" name="nomor" id="nomor" placeholder="{{$errors->has('nomor') ? $errors->first('nomor') : '' }}" value="{{$user->nomor}}" required></td>
               </tr>
               <tr>
                   <td><label for="role">Pilih posisi</label></td>
                   <td>
                       <ul>
                           <li><input type="radio" name="role" id="role" value="customer" {{ ($user->role=="customer")? "checked" : "" }} required>Customer</li>
                           <li><input type="radio" name="role" id="role" value="admin" {{ ($user->role=="admin")? "checked" : "" }} required>Admin</li>
                           <li><input type="radio" name="role" id="role" value="resepsionis" {{ ($user->role=="resepsionis")? "checked" : "" }} required>Resepsionis</li>
                       </ul>
                   </td>
               </tr>
               <tr>
                   <td></td>
                   <td><button type="submit" class="redButton">UBAH</button></td>
               </tr>
           </table>
           </form>
        </div>
        @endforeach

        @foreach($rooms as $room)
        <div class="editRoom editData displayNone" id="editRoom{{$room->id}}">
           <h1>Edit Room</h1>
           <form action="admin/editRoom" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$room->id}}">
           <table>
               <tr>
                   <td><label for="nama_kamar">Masukkan nama kamar</label></td>
                   <td><input type="text" name="nama_kamar" id="nama_kamar" value="{{$room->nama_kamar}}" required></td>
               </tr>
               <tr>
                   <td><label for="jumlah_kamar">Masukkan jumlah kamar</label></td>
                   <td><input type="number" name="jumlah_kamar" id="jumlah_kamar" value="{{$room->jumlah_kamar}}"required></td>
               </tr>
               <tr>
                   <td><label for="fasilitas_id">Pilih fasilitas</label></td>
                   <td>
                       <select name="fasilitas_id" id="fasilitas_id" required>
                           @foreach($roomFacilitys as $roomFacility)
                           <option value="{{$roomFacility->id}}">{{$roomFacility->fasilitas}}</option>
                           @endforeach
                       </select>
                   </td>
               </tr>
               <tr>
                   <td><label for="harga">Masukkan harga</label></td>
                   <td><input type="number" name="harga" id="harga" value="{{$room->harga}}" required></td>
               </tr>
               <tr>
                   <td><label for="foto">Masukkan foto</label></td>
                   <td>
                       <img src="/storage/{{$room->foto}}" alt="">
                       <br>
                       <input type="file" name="foto" id="foto">
                    </td>
               </tr>
               <tr>
                   <td></td>
                   <td><button type="submit" class="redButton">UBAH</button></td>
               </tr>
           </table>
           </form>
        </div>
        @endforeach

        @foreach($roomFacilitys as $roomFacility)
        <div class="editRoomFacility editData displayNone" id="editRoomFacility{{$roomFacility->id}}">
            <h1>Edit Room Facility</h1>
            <form action="admin/editRoomFacility" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$roomFacility->id}}">
                <table>
                    <tr>
                        <td><label for="fasilitas">Masukkan fasilitas kamar</label></td>
                        <td><textarea name="fasilitas" id="fasilitas" cols="15" rows="5" required>{{$roomFacility->fasilitas}}</textarea></td>
                    </tr>
                    <tr>
                        <td><label for="luas_kamar">Masukkan luas kamar</label></td>
                        <td><input type="text" name="luas_kamar" id="luas_kamar" value="{{$roomFacility->luas_kamar}}" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="redButton">UBAH</button></td>
                    </tr>
                </table>
            </form>
        </div>
        @endforeach

    @foreach($hotelFacilitys as $hotelFacility)
    <div class="editHotelFacility editData displayNone" id="editHotelFacility{{$hotelFacility->id}}">
        <h1>Edit Hotel Facility</h1>
        <form action="admin/editHotelFacility" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$hotelFacility->id}}">
           <table>
               <tr>
                   <td><label for="fasilitas_hotel">Masukkan nama fasilitas hotel</label></td>
                   <td><input type="text" name="fasilitas" id="fasilitas_hotel" value="{{$hotelFacility->fasilitas}}" required></td>
               </tr>
               <tr>
                   <td><label for="keterangan">Masukkan keterangan fasilitas hotel</label></td>
                   <td><textarea name="keterangan" id="keterangan" cols="15" rows="5" required>{{$hotelFacility->keterangan}}</textarea></td>
               </tr>
               <tr>
                   <td><label for="foto">Masukkan foto</label></td>
                   <td>
                       <img src="/storage/{{$hotelFacility->foto}}" alt="">
                       <br>
                       <input type="file" name="foto" id="foto">
                    </td>
               </tr>
               <tr>
                   <td></td>
                   <td><button type="submit" class="redButton">UBAH</button></td>
               </tr>
           </table>
        </form>
    </div>
    @endforeach
    </div>
</div>

<script src="/js/dashboard/admin.js"></script>
</body>
</html>