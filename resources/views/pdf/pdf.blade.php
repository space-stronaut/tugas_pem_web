<!DOCTYPE html>
<html>
<head>
	<title>Laporan SPP</title>
</head>
<body>

	<div class="container">
		<center>
			<h4>Laporan SPP</h4>
		</center>
		<br/>
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Jenis Pembayaran</th>
					<th>Jumlah Bayar</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($tagihans as $p)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$p->user->name}}</td>
					<td>{{$p->pembayaran->nama_pembayaran}}</td>
					<td>{{$p->jumlah_bayar}}</td>
					<td>{{$p->status}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

</body>
</html>