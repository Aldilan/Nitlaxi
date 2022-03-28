<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icon/favicon.png">
    <style>
        .contain {
            text-align: center;
        }
        table {
            margin: auto;
        }
        table tr td {
            padding: 2px;
        }
        ul {
            list-style: none;
        }
    </style>
    <title>Nitlaxi | Struk | {{Auth::user()->username}}</title>
</head>
<body>
    <div class="container">
        <div class="contain">
            <div class="headerContain">
                <h1>Nitlaxi Hotel</h1>
                <span class="headUp">Bata Alam Lido</span><br>
                <span class="headDown">Jl. Hr. Edi Sukma</span>
            </div>
            <h3>Struk pemesanan {{Auth::user()->username}}</h3>
            @php
                $i = 0
            @endphp
            @php 
                $j = 1
            @endphp
            <table>
                <tr>
                    <th>No</th>
                    <th>Kamar</th>
                    <th>Harga</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Pembayaran</th>
                </tr>
                @foreach($struks as $struk)
                <tr>
                    <td>{{$j++}}</td>
                    <td>{{$struk->tipe_kamar}}</td>
                    <td>
                        @foreach($rooms as $room)
                            @if($room->nama_kamar == $struk->tipe_kamar)
                                IDR. {{$room->harga}}
                                @php
                                    $i = $i + $room->harga
                                @endphp
                            @endif
                        @endforeach
                    </td>
                    <td>{{$struk->created_at}}</td>
                    <td>{{$struk->pembayaran}}</td>
                </tr>
                <tr>
                    <td colspan="2">Total</td>
                    <td>IDR. 
                    @php
                        echo $i
                    @endphp</td>
                </tr>
                @endforeach
            </table>
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