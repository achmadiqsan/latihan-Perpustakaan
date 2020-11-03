<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>LAPORAN DATA BUKU</title>
	<link rel="stylesheet" type="text/css" href="styletabel.css">
</head>
<body>
	<h3 align="center">LAPORAN DATA BUKU</h3>
	<table cellspacing='0' align="center">
		<thead>
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Nama Anggota</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Kelas</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			$koneksi = new mysqli("localhost","root","","db_perpustakaan1");

			if (isset($_GET['tgl1']) && isset($_GET['tgl2'])) {

				$tgl1 = date('Y-m-d', strtotime($_GET['tgl1']));
				$tgl2 = date('Y-m-d', strtotime($_GET['tgl2'])) ;

				$sql = "SELECT * FROM tb_anggota WHERE tgl_input BETWEEN '$tgl1' AND '$tgl2' ";
				$query = mysqli_query($koneksi,$sql);

				$no = 0; 

				while ($data = mysqli_fetch_array($query)) { 

					$nis = $data['nis'];
					$nama = $data['nama'];
					$tempat_lahir = $data['tempat_lahir'];
					$tgl_lahir = $data['tgl_lahir'];
					$jk = $data['jk'];
					$kelas = $data['kelas'];

					$no++;


					?>

					<tr>
						<td align="center"><?php echo $no; ?></td>
						<td><?php echo $nis; ?></td>
						<td align="center"><?php echo $nama; ?></td>
						<td align="center"><?php echo $tempat_lahir; ?></td>
						<td align="center"><?php echo $tgl_lahir; ?></td>
						<td align="center"><?php echo $jk; ?></td>
						<td align="center"><?php echo $kelas; ?></td>
					</tr>

				<?php } 

			}
			?>
		</tbody>
	</table>
	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>