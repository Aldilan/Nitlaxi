<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icon/favicon.png">
    <link rel="stylesheet" href="/css/loginPages/login.css">
    <title>Nitlaxi Hotel | Login</title>
</head>
<body>
    <div class="container">
        <div class="menus">
            <div class="pages">
                <ul>
                    <li id="booking">Login</li>
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
                <li><h1>MASUK</h1></li>
                <li><small>Masuk Ke Dalam Akun Anda Di Sini</small></li>
            </ul>
            @if(session()->has('successNotif'))
                <div class="successNotif">
                    <span>{{ session('successNotif') }}</span>
                    <button id="closeNotif">X</button>
                </div>
            @elseif(session()->has('failNotif'))
                <div class="failNotif">
                    <span>{{ session('failNotif') }}</span>
                    <button id="closeNotif">X</button>
                </div>
            @endif
            <input type="hidden" id="closeNotif">
            <span>Untuk pemesanan lebih cepat di kemudian hari, simpan data pribadi, preferensi, dan informasi kartu loyalitas Anda, serta selalu dapatkan berita terbaru melalui buletin kami, dan jangan sekali-kali menyebar username dan password ke orang lain termasuk karyawan Nitlaxi, terkecuali jika sudah ada informasi resmi sebelumnya (Informasi ini biasa dikirim ke email yang sudah didaftarkan)</span>
            <table>
            <form action="/login" method="post">
            @csrf    
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" name="username" id="username" autofocus required></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">MASUK</button></td>
                </tr>
            </form>
            </table>
            <small>Belum punya akun? <a href="/signup">Daftar di sini</a></small>
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

    <script src="/js/loginPages/login.js"></script>
</body>
</html>