<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/landingPage.css">
    @auth
        <title>Nitlaxi Hotel | Home | {{Auth::user()->username}}</title>
    @else
        <title>Nitlaxi Hotel | Home</title>
    @endauth
</head>
<body>
    <div class="container">
        <div class="headers">
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
            <input type="hidden" id="closeNotif">
            <div class="header1">
                <div class="icon">
                    <a href="">
                        <img src="/img/logo.png">
                    </a>
                </div>
                <div class="header">
                    <ul>
                        <li><h1>HOTEL INDONESIA NITLAXI BOGOR</h1></li>
                        <li><small>Bogor, Indoensia</small></li>
                    </ul>
                </div>
                <div class="langNLog">
                    <ul>
                        <li><span>Language</span></li>
                        @auth
                            <li>
                                <button class="dropdownProfileLink">{{Auth::user()->username}}</button>
                            </li>
                        @else
                            <li>
                                <button class="dropdownProfileLink">Login</button>
                            </li>
                        @endauth
                    </ul>
                </div>
                @auth
                <div class="dropdownProfile displayNone">
                    <ul>
                        <li><a href="/struk">struk</a></li>
                        @if(Auth::user()->role == 'admin')
                        <li><a href="/admin">Admin</a></li>
                        @elseif(Auth::user()->role == 'resepsionis')
                        <li><a href="/resepsionis">Resepsionis</a></li>
                        @else
                        @endif
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <div class="dropdownProfile displayNone">
                    <ul>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/signup">Daftar</a></li>
                    </ul>
                </div>
                @endauth
            </div>
        </div>
        <div class="menus">
            <div class="pages">
                <ul>
                    <li><a href="/" class="active">HOME</a></li>
                    <li><a href="/about">ABOUT</a></li>
                    <li><a href="/room&Suites">ROOM</a></li>
                    <li><a href="/">GALLERY</a></li>
                    <li><a href="https://bit.ly/nitwa">CONTACT US</a></li>
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
        <div class="contains">
            <div class="containLeft">
                <h1>HOTEL INDONESIA NITLAXI BOGOR</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos voluptatum expedita voluptas reprehenderit possimus numquam quidem cumque magnam suscipit! Quaerat.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio vel esse atque? Tempora vero commodi cum aspernatur reprehenderit! Voluptas eum at mollitia blanditiis, facere veritatis et qui nulla quia maxime ratione tempore magni doloremque tempora recusandae pariatur id amet voluptatum.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum optio natus aliquam esse incidunt distinctio quasi. Ipsa voluptatum magnam provident beatae. Veniam nobis, impedit repellat repellendus deleniti explicabo eum. Fugit.</p>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="containRight">
                <div id="map"></div>
            </div>
        </div>
        <div class="roomNSuites">
            <div class="headerRNS">
                <h1>Room & Suite</h1>
                <small>BEST RATE GUARANTEED</small>
            </div>
            <div class="optionRNS">
                <ul>
                    <li id="LuxuryRNS" class="rnsOpt luxuryRNS borderBottom">Luxury Room</li>
                    <li class="rnsOpt">Luxury Suite</li>
                </ul>
            </div>
            @foreach($rooms as $room)
                @if($room->nama_kamar == 'Kamar Luxury' || $room->nama_kamar == 'Luxury Suite')
                <div class="RNS" id="{{$room->nama_kamar}}">
                    <div class="RNSContainer">
                            <div class="RNSContain">
                                <div class="RNSLeft">
                                    <div class="aboutRoom">
                                        <h1>{{$room->nama_kamar}}</h1>
                                        @foreach($roomFacilitys as $fasilitasKamar)
                                            @if($fasilitasKamar->id == $room->fasilitas_id)
                                                <p>Ruangan ini memilki fasilitas {{$fasilitasKamar->fasilitas}}</p>
                                            @endif
                                        @endforeach
                                        <a href="/room&Suites"><button id="detailRoom">DETAIL</button></a><a href="/room&Suites"><button id="bookRoom">BOOK NOW</button></a>
                                    </div>
                                </div>
                                <div class="RNSRight">
                                    <img src="/storage/{{$room->foto}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            </div>
        <div class="offers">
            <div class="headSlider">
                <h1>Our Gallery</h1>
                <small>A feeling You have never experienced before. Get our hotel facilities</small>
            </div>
            <div class="slider">
                <div class="slides">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <div class="slide first">
                        <img src="/img/nitlaxi.jpeg" alt="">
                    </div>
                    <div class="slide">
                        <img src="/img/nitlaxi2.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="/img/nitlaxi3.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="/img/nitlaxi4.jpg" alt="">
                    </div>

                    <div class="autoNavigation">
                        <div class="autoBtn1"></div>
                        <div class="autoBtn2"></div>
                        <div class="autoBtn3"></div>
                        <div class="autoBtn4"></div>
                    </div>
                </div>

                <div class="manualNavigation">
                    <label for="radio1" class="manualBtn"></label>
                    <label for="radio2" class="manualBtn"></label>
                    <label for="radio3" class="manualBtn"></label>
                    <label for="radio4" class="manualBtn"></label>
                </div>
            </div>
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

    <script src="/js/landingPage.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYalh-Ugn8rSd5g6aaTeD-pmj4HMROSdo&callback=initMap&libraries=&v=weekly" async></script>
</body>
</html>
