<?php 

	$id = $_GET['id'];
	$judul = $_GET['judul'];
	$tgl_kembali = $_GET['tgl_kembali'];
	$lambat = $_GET['lambat'];

	if ($lambat > 7) {
		?>

		<script type="text/javascript">
			alert("Buku yang di pinjam tidak dapat diperpanjang, karena sudah melewati tanggal kembali, kembalikan buku kemudian baru bisa pinjam kembali");
			window.location.href="?page=transaksi";
		</script>

		<?php
	} else {
		$pecah = explode("-", $tgl_kembali);
		$next_7_hari = mktime(0,0,0,$pecah[1],$pecah[0]+7,$pecah[2]);
		$hari_next = date("d-m-Y", $next_7_hari);

		$update = $koneksi->query("UPDATE tb_transaksi SET tgl_kembali = '$hari_next' WHERE id = '$id'");

		if ($update) {
			?>

			<script type="text/javascript">
				alert("Berhasil Perpanjang Peminjaman Buku");
				window.location.href="?page=transaksi";
			</script>

			<?php
		} else {
			?>

			<script type="text/javascript">
				alert("Gagal Diperpanjang");
				window.location.href="?page=transaksi";
			</script>

			<?php
		}
	}

 ?>