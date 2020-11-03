<?php

        // cek apakah tombol daftar sudah diklik atau belum ?
if (isset($_GET['id_buku'])) {
    
        // ambil data dari formulir :
    $id_buku = $_GET['id_buku'];

        // buat query hapus
    $sql = "DELETE FROM tb_buku WHERE id_buku=$id_buku";
    $query = mysqli_query($koneksi,$sql);

        // apakah query simpan berhasil ?
    if ($query) {
        ?>
        <script type="text/javascript">
            alert("DATA BERHASIL DI DELETE");
            window.location.href="?page=buku";
        </script>
        <?php
    } else {

        ?>
        <script type="text/javascript">
            alert("DATA TIDAK BERHASIL DI DELETE");
            window.location.href="?page=buku";
        </script>
        <?php

    }

}
?>