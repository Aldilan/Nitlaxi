<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icon/favicon.png">
    <link rel="stylesheet" href="/css/dashboard/resepsionis.css">
    <title>Nitlaxi | Resepsionis</title>
</head>
<body>

<div class="container">
    <div class="homeContain">
        <h1>Dashboard Resepsionis</h1>
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
    <div class="dataTable">
        <h1>Tabel Reservasi</h1>
        <div class="searchBar">
            <div class="searchBarLeft">
                <input type="date" class="searchTgl">
                <button class="searchTglButton redButton">Search</button>
            </div>
            <div class="searchBarRight">
                <input type="text" placeholder="Cari berdasarkan nama tamu" class="searchNama">
                <button class="searchNamaButton redButton">Search</button>
            </div>
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Tipe Kamar</th>
                    <th>Tanggal Check In</th>
                    <th>Tanggal Check Out</th>
                </tr>
                @foreach ($resepsionis as $resepsionis)
                <tr class="idTable" id="{{$resepsionis->nama_tamu}}">
                    <input type="hidden" class="tglInTable" id="{{$resepsionis->tgl_check_in}}">
                    <td>{{$i++}}</td>
                    <td>{{$resepsionis->nama_tamu}}</td>
                    <td>{{$resepsionis->tipe_kamar}}</td>
                    <td>{{$resepsionis->tgl_check_in}}</td>
                    <td>{{$resepsionis->tgl_check_out}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="resetSearch displayNone">
            <span>Reset</span>
        </div>
    </div>
</div>

<script src="/js/dashboard/resepsionis.js"></script>
</body>
</html>