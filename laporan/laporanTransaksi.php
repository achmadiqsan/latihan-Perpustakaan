<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>LAPORAN DATA TRANSAKSI PEMINJAMAN BUKU</title>
	<link rel="stylesheet" type="text/css" href="styletabel.css">
</head>
<body>
	<h3 align="center">LAPORAN DATA TRANSAKSI PEMINJAMAN BUKU</h3>
	<table align="center" cellspacing='0'>
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>NIS</th>
				<th>Nama Anggota</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Kembali</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			$koneksi = new mysqli("localhost","root","","db_perpustakaan1");

			$sql = "SELECT * FROM tb_transaksi";
			$query = mysqli_query($koneksi,$sql);

			$no = 0; 

			while ($data = mysqli_fetch_array($query)) { 

			$judul = $data['judul'];
			$nis = $data['nis'];
			$nama = $data['nama'];
			$tgl_pinjam = $data['tgl_pinjam'];
			$tgl_kembali = $data['tgl_kembali'];
			$status = $data['status'];

			$no++;


			?>

			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td><?php echo $judul; ?></td>
				<td align="center"><?php echo $nis; ?></td>
				<td align="center"><?php echo $nama; ?></td>
				<td align="center"><?php echo $tgl_pinjam; ?></td>
				<td align="center"><?php echo $tgl_kembali; ?></td>
				<td align="center"><?php echo $status; ?></td>
			</tr>

			<?php } ?>
		</tbody>
	</table>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>