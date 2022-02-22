<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/about.css">
    <title>Nitlaxi Hotel | About</title>
</head>
<body>
    <div class="container">
        <div class="menus">
            <div class="pages">
                <ul>
                    <li><a href="/">HOME</a></li>
                    <li><a href="/about" class="active">ABOUT</a></li>
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
        <div class="contain">
            <ul>
                <li><h1>ABOUT US</h1></li>
                <li><small>Luxury 5 Star Hotel in Bogor</small></li>
            </ul>
            <span>
                <h1>Nitlaxi - we will serve guests even if the request is strange</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt unde sed at consequatur eum distinctio maxime, labore eveniet minima animi qui fugiat perferendis et adipisci, provident magnam quo eligendi laboriosam explicabo obcaecati. Nesciunt alias fuga quam aperiam porro voluptate ad.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla ipsum voluptatem dolorem reiciendis natus. Ratione illum perspiciatis explicabo veritatis, dicta nisi pariatur tenetur porro atque voluptatem delectus ex similique nemo mollitia ipsam quod illo tempora ut recusandae voluptas quia commodi. Laboriosam est eaque quo impedit, molestias atque modi, expedita exercitationem qui officia totam, praesentium facere corporis quod quisquam aspernatur placeat!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam dolorem tempora minima, sapiente sed vitae unde delectus. Fugit quis facere perspiciatis magni, aliquid maxime et libero, corrupti cumque suscipit incidunt!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore beatae enim ipsa provident dolor animi soluta odit dicta, aliquid quibusdam sapiente earum fugit nihil, assumenda commodi maxime. Animi, eveniet exercitationem maxime, libero quibusdam ullam esse voluptates consequatur ut at quos iusto id tempore veritatis rerum, repellendus unde iure saepe sed magnam optio quas ea cupiditate? Blanditiis possimus dolores omnis amet dolorem perferendis excepturi labore eius voluptatum in. Impedit, expedita deleniti illum ut praesentium consequuntur nobis corporis quibusdam quasi perferendis voluptatum vitae sequi itaque voluptatibus quis esse incidunt. Fuga cum, esse nam temporibus non tempore explicabo, dolorum quaerat dignissimos dolores voluptate?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro numquam commodi ex, at sequi, minima, tempora doloribus excepturi sapiente iste aut culpa dolore magni qui vel vitae alias inventore consequuntur atque nesciunt quod. Officiis quidem eum deleniti libero saepe voluptates. Laborum reprehenderit sunt inventore quaerat impedit corrupti asperiores architecto repudiandae maxime officia! Magnam natus eligendi debitis laudantium! Praesentium odit aliquam mollitia dignissimos non porro, in, placeat repellat omnis magnam a neque, voluptatum officia recusandae! Maxime quisquam aut commodi voluptates delectus.</p>
            </span>
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

    <script src="/js/about.js"></script>
</body>
</html>