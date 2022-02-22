<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/struk.css">
    <title>Nitlaxi | Struk | {{Auth::user()->username}}</title>
</head>
<body>
    <div class="container">
        <div class="backArrow">
            <a href="/"><img src="/img/icon/arrow.png" alt=""></a>
        </div>
        <div class="contain">
            <div class="headerContain">
                <h1>Nitlaxi Hotel</h1>
                <span class="headUp">Bata Alam Lido</span><br>
                <span class="headDown">Jl. Hr. Edi Sukma</span>
            </div>
            <div class="struk idStruk1">
                <span>Tanggal pemesanan: </span>
                    <ul>
                @foreach($struks as $struk)
                        <li>{{$struk->created_at}}</li>
                @endforeach
                    </ul>
            </div>
            <div class="struk idStruk2">
                <span>Nama pemesan: </span>
                <span>{{Auth::user()->username}}</span>
            </div>
            @php
                $i = 0
            @endphp
            <div class="struk containStruk1">
                <ul>
                @foreach($struks as $struk)
                    <li>{{$struk->tipe_kamar}}</li>
                @endforeach
                </ul>
                <ul>
                @foreach($struks as $struk)
                    @foreach($rooms as $room)
                        @if($room->nama_kamar == $struk->tipe_kamar)
                            <li>{{$room->harga}}</li>
                            @php
                                $i = $i + $room->harga
                            @endphp
                        @endif
                    @endforeach
                @endforeach
                </ul>
            </div>
            <div class="struk containStruk2">
                <span>Total</span>
                <span>
                    @php
                        echo $i
                    @endphp
                </span>
            </div>
            <div class="struk containStruk3">
                <span>Metode pembayaran:</span>
                <ul>
                    @foreach($struks as $struk)
                        <li>{{$struk->pembayaran}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="footerStruk">
                <ul>
                    <li>Thank You</li>
                    <li>Untuk Bukti Pembayaran Bisa Langsung Tunjukkan ke Resepsionis</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>