<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>LAPORAN DATA BUKU</title>
	<link rel="stylesheet" type="text/css" href="styletabel.css">
</head>
<body>
	<h3 align="center">LAPORAN DATA BUKU</h3>
	<table align="center" cellspacing='0'>
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Tahun</th>
				<th>ISBN</th>
				<th>Jumlah</th>
				<th>Lokasi</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			$koneksi = new mysqli("localhost","root","","db_perpustakaan1");

			$sql = "SELECT * FROM tb_buku";
			$query = mysqli_query($koneksi,$sql);

			$no = 0; 

			while ($data = mysqli_fetch_array($query)) { 

				$judul = $data['judul'];
				$pengarang = $data['pengarang'];
				$penerbit = $data['penerbit'];
				$tahun_terbit = $data['tahun_terbit'];
				$isbn = $data['isbn'];
				$jumlah_buku = $data['jumlah_buku'];
				$lokasi = $data['lokasi'];

				$no++;


				?>

				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $judul; ?></td>
					<td align="center"><?php echo $pengarang; ?></td>
					<td align="center"><?php echo $penerbit; ?></td>
					<td align="center"><?php echo $tahun_terbit; ?></td>
					<td align="center"><?php echo $isbn; ?></td>
					<td align="center"><?php echo $jumlah_buku; ?></td>
					<td align="center"><?php echo $lokasi; ?></td>
				</tr>

			<?php } ?>
		</tbody>
	</table>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>