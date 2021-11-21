<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran Telah Terkonfirmasi</title>
</head>
<body>
    <style>
        *{
            font-family: sans-serif;
        }
    </style>
    <center>Halo {{$user->user->name}}</center>
    <p>Pembayaran SPP kamu telah Terkonfirmasi</p>
    <p>Detail Pembayaran</p>
    <p>Nama : {{ $user->user->name }}</p>
    <p>Tanggal Transaksi : {{ Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</p>
    <p>Jumlah Pembayaran : {{ $user->jumlah_bayar }}</p>
    <p>Pembayaran : {{ $user->pembayaran->nama_pembayaran }}</p>
</body>
</html>