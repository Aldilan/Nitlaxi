<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icon/favicon.png">
    <link rel="stylesheet" href="/css/loginPages/signup.css">
    <title>Nitlaxi Hotel | Login</title>
</head>
<body>
    <div class="container">
        <div class="menus">
            <div class="pages">
                <ul>
                    <li id="booking">Signup</li>
                    <li><a href="/">HOME</a></li>
                    <li><a href="/about">ABOUT</a></li>
                    <li><a href="/room&Suites">ROOM</a></li>
                    <li><a href="/">GALLERY</a></li>
                    <li><a href="https://bit.ly/nitwa">CONTACT US</a></li>
                    @auth
                    @if(Auth::user()->role == 'customer')
                        <li><a href="/struk">STRUK</a></li>
                    @endif
                    @endauth
                    <li id="menus"><img src="/img/icon/menu.png" alt=""></li>
                </ul>
            </div>
            <div class="booking">
            @auth
                <form action="/booking" method="post">
                @csrf
                <ul>
                    <li>
                        <select name="ruangan" id="">
                            @foreach($rooms as $room)
                            <option value="{{$room->nama_kamar}}">{{$room->nama_kamar}}</option>
                            @endforeach
                        </select>
                    </li>
                    <li><input type="date" name="tgl_check_in" id="tgl_check_in" placeholder="CHECK IN" value="2022-02-02" required></li>
                    <li><input type="date" name="tgl_check_out" id="tgl_check_out" placeholder="CHECK OUT" required></li>
                    <li><button class="redButton">BOOK NOW</button></li>
                </ul>
                </form>
            @else
                <ul>
                    <li>
                        <select name="" id="">
                            @foreach($rooms as $room)
                            <option value="{{$room->nama_kamar}}">{{$room->nama_kamar}}</option>
                            @endforeach>
                        </select>
                    </li>
                    <li><input type="date" name="tgl_check_in" id="tgl_check_in" placeholder="CHECK IN"></li>
                    <li><input type="date" name="tgl_check_out" id="tgl_check_out" placeholder="CHECK OUT"></li>
                    <li><a href="/login"><button class="redButton">BOOK NOW</button></a></li>
                </ul>
            @endauth
            </div>
        </div>
        <div class="menuSlide">
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="/about" class="active">ABOUT</a></li>
                <li><a href="/room&Suites">ROOM</a></li>
                <li><a href="/">GALLERY</a></li>
                <li><a href="https://bit.ly/nitwa">CONTACT US</a></li>
                @auth
                @if(Auth::user()->role == 'customer')
                    <li><a href="/struk">STRUK</a></li>
                @endif
                @endauth
            </ul>
        </div>
        <div class="contain">
            <ul>
                <li><h1>DAFTAR</h1></li>
                <li><small>Buat Akun Anda Di Sini</small></li>
            </ul>
            @if(session()->has('failNotif'))
                <div class="failNotif">
                    <span>{{ session('failNotif') }}</span>
                    <button id="closeNotif">X</button>
                </div>
            @endif
            <span>Buat akun anda dan bergabung menjadi bagian dari keluarga Nitlaxi dan dapatkan berita dan promo-promo terbaru mengenai Nitlaxi Hotel.</span>
            <table>
            <input type="hidden" id="closeNotif">
            <form action="/signup" method="post">
                @csrf
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" name="username" id="username" placeholder="{{$errors->has('username') ? $errors->first('username') : '' }}" autofocus required></td>
                </tr>
                <tr>
                    <td><label for="namaDepan">Nama Depan:</label></td>
                    <td><input type="text" name="namaDepan" id="namaDepan" placeholder="{{$errors->has('namaDepan') ? $errors->first('namaDepan') : '' }}" required></td>
                </tr>
                <tr>
                    <td><label for="namaBelakang">Nama Belakang:</label></td>
                    <td><input type="text" name="namaBelakang" id="namaBelakang" placeholder="{{$errors->has('namaBelakang') ? $errors->first('namaBelakang') : '' }}" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" name="email" id="email" placeholder="{{$errors->has('email') ? $errors->first('email') : '' }}" required></td>
                </tr>
                <tr>
                    <td><label for="nomor">Nomor hp:</label></td>
                    <td><input type="number" name="nomor" id="nomor" placeholder="{{$errors->has('nomor') ? $errors->first('nomor') : '' }}" required></td>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" name="password" id="password" placeholder="{{$errors->has('password') ? $errors->first('password') : '' }}" required></td>
                </tr>
                <tr>
                    <td><label for="passwordConfirm">Konfirmasi Password:</label></td>
                    <td><input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="{{$errors->has('confirmPassword') ? $errors->first('confirmPassword') : '' }}" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">DAFTAR</button></td>
                </tr>
            </form>
            </table>
        <small>Sudah punya akun? <a href="/login">Masuk di sini</a></small>
        </div>
        <div class="footer">
            <div class="footerLeft">
                <ul>
                    <li class="footerImgFirst"><a href=""><img src="/img/fb.png" alt=""></a></li>
                </ul>
                <ul>
                    <li><a href=""><img src="/img/ig.png" alt=""></a></li>
                </ul>
                <ul>
                    <li><a href=""><img src="/img/twitter.png" alt=""></a></li>
                </ul>
            </div>
            <div class="footerMid">
                <span>© 2021 Nitlaxi Hotel. All Rights Reserved</span>
            </div>
            <div class="footerRight">
                <span id="hour">hour</span><span id="minute">minute</span>
                <img src="/img/pgUp.png" alt="">
            </div>
        </div>
    </div>

    <script src="/js/loginPages/signup.js"></script>
</body>
</html>