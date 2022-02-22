<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/RNS.css">
    <title>Nitlaxi Hotel | Room and Suites</title>
</head>
<body>
    <div class="container">
        <div class="menus">
            <div class="pages">
                <ul>
                    <li><a href="/">HOME</a></li>
                    <li><a href="/about">ABOUT</a></li>
                    <li><a href="/room&Suites" class="active">ROOM</a></li>
                    <li><a href="/">GALLERY</a></li>
                    <li><a href="">CONTACT US</a></li>
                    @auth
                        <li><a href="/struk">STRUK</a></li>
                    @endauth
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
        <div class="contain">
            <h1>ROOM AND SUITES</h1>
            <ul>
            @foreach($rooms as $room)
                <li>
                    <div class="rns">
                        <img src="/storage/{{$room->foto}}" alt="">
                        <ul>
                            <li><h1>{{$room->nama_kamar}}</h1></li>
                            @foreach($roomFacilitys as $roomFacility)
                                @if($roomFacility->id == $room->fasilitas_id)
                                    <li><small>{{$roomFacility->luas_kamar}}</small></li>
                                @endif
                            @endforeach
                            <li><button class="buttonDetail" id="detailRoom{{$room->id}}">LIHAT DETAIL</button></li>
                        </ul>
                    </div>
                </li>
            @endforeach 
            </ul>
        </div>
        @foreach($rooms as $room)
        <div class="modalContainer" id="detailRoom{{$room->id}}">
            <div class="modalHead"><h1>{{$room->nama_kamar}}</h1></div>
            <br>
            <div class="modalContain">
                <img src="/storage/{{$room->foto}}" alt="">
                <ul>
                    <li>
                        <h1>IDR {{$room->harga}}</h1>
                    </li>
                    <li>
                        <small>Jumlah Kamar : {{$room->jumlah_kamar}}</small>
                    </li>
                    <li>
                        <span>AMENITIES: </span>
                    </li>
                    <li class="modalLiP">
                        @foreach($roomFacilitys as $roomFacility)
                            @if($roomFacility->id == $room->fasilitas_id)
                                <p>{{$roomFacility->fasilitas}}</p>
                            @endif
                        @endforeach
                    </li>
                    <li>
                        <button class="buttonClose">Close</button>
                    </li>
                </ul>
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
    </div>

    <script src="/js/RNS.js"></script>
</body>
</html>