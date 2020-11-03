<?php 

	$id = $_GET['id'];
	$id_buku = $_GET['judul'];

	$sql = $koneksi->query("DELETE FROM tb_transaksi WHERE id = $id");

	$buku = $koneksi->query("UPDATE tb_buku SET jumlah_buku = (jumlah_buku+1) WHERE judul = '$id_buku' ");

	if ($sql || $buku) {
		?>

		<script type="text/javascript">
			alert("Buku Berhasil Dikembalikan");
			window.location.href="?page=transaksi";
		</script>

		<?php
	}

 ?>