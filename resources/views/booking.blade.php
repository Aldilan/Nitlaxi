<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icon/favicon.png">
    <link rel="stylesheet" href="/css/booking.css">
    <title>Nitlaxi Hotel | Room and Suites</title>
</head>
<body>
    <div class="container">
        <div class="menus">
            <div class="pages">
                <ul>
                    <li id="booking">Booking</li>
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
                <li><a href="/about">ABOUT</a></li>
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
    <form action="/struk" method="post">
    @csrf
        @foreach($roomz as $room)
        <div class="headerContain">
            <h1>Hasil Pencarian : {{$room->nama_kamar}}</h1>
        </div>
        <div class="contain">
            <div class="headContain">
                <h1>{{$room->nama_kamar}}</h1>
                <ul>
                    <li>Advanteges</li>
                    <li>No. off Room</li>
                    <li>Price</li>
                </ul>
            </div>
            @foreach($fasilitas as $fasilitas)
            <div class="bookingContain">
                <div class="imgBooking">
                    <img src="/storage/{{$room->foto}}" alt="">
                    <ul>
                        <li>Luas kamar: {{$fasilitas->luas_kamar}}</li>
                        <li><a href="/room&Suites"><button type="button" class="redButton">DETAIL ROOM</button></a></li>
                    </ul>
                </div>
                <div class="detailBooking">
                    <div class="detailBooking1">
                        <h1>Room Detail</h1>
                        <ul>
                            <li>
                                <ol>
                                    <li>Wifi gratis</li>
                                    <li>Wifi gratis</li>
                                    <li>Wifi gratis</li>
                                </ol>
                            </li>
                            <li>
                                <select name="" id="noRoom">
                                    @for($i = 1; $i < $room->jumlah_kamar+1; $i++)
                                    <option value="">Room {{$i}}</option>
                                    @endfor
                                </select>
                            </li>
                        </ul>
                    </div>
                    <div class="detailBooking2">
                        <h1>{{$room->harga}}</h1>
                        <small>/room/night</small>
                    </div>
                    <div class="detailBooking3">
                        @if($room->jumlah_kamar >0)
                        <p>Room info: 
                            <span class="ava">available</span>
                        </p>
                        <a href="" id="paymentButton"><button class="redButton">BOOK NOW</button></a>
                        @else
                        <p>Room info: 
                            <span class="notAva">Not available</span>
                        </p>
                        <a href="/"><button class="redButton">SEARCH OTHER ROOM</button></a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="modalContainer">
            <div class="modalHead"><h1>Pilih Metode Pembayaran</h1></div>
            <br>
            <div class="modalContain">
                <div class="payment">
                    <label for="pembayaran">Pembayaran Instan</label>
                    <input type="radio" name="pembayaran" value="Pembayaran instan" required>
                </div>
                <div class="payment">
                    <label for="pembayaran">Transfer Bank</label>
                    <input type="radio" name="pembayaran" value="Transfer bank">
                </div>
                <div class="payment">
                    <label for="pembayaran">Virtual Account</label>
                    <input type="radio" name="pembayaran" value="Virtual account">
                </div>
                <div class="payment">
                    <label for="pembayaran">Kartu Kredit</label>
                    <input type="radio" name="pembayaran" value="Kartu kredit">
                </div>
                <div class="buttonPayment">
                    <button type="submit" class="redButton">BUAT PESANAN</button>
                    <button type="button" class="buttonClose">KEMBALI</button>
                </div>
            </div>
        </div>
        @endforeach
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
        <input type="hidden" name="tipe_kamar" value="{{$room->nama_kamar}}">
        <input type="hidden" name="nama_pemesan" value="{{Auth()->user()->username}}">
        <input type="hidden" name="nama_tamu" value="{{Auth()->user()->name}}">
        <input type="hidden" name="email" value="{{Auth()->user()->email}}">
        <input type="hidden" name="nomor" value="{{Auth()->user()->nomor}}">
        <input type="hidden" name="tgl_check_in" value="{{$checkIn}}">
        <input type="hidden" name="tgl_check_out" value="{{$checkOut}}">
    </form>
    </div>

    <script src="/js/booking.js"></script>
</body>
</html>