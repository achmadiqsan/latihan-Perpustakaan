<?php

        // cek apakah tombol daftar sudah diklik atau belum ?
    if (isset($_GET['id_lokasi'])) {
        
        // ambil data dari formulir :
        $id_lokasi = $_GET['id_lokasi'];

        // buat query hapus
        $sql = "DELETE FROM tb_lokasi WHERE id_lokasi=$id_lokasi";
        $query = mysqli_query($koneksi,$sql);

        // apakah query simpan berhasil ?
        if ($query) {
            ?>
            <script type="text/javascript">
                alert("DATA BERHASIL DI DELETE");
                window.location.href="?page=lokasiBuku";
            </script>
            <?php
        } else {

            ?>
            <script type="text/javascript">
                alert("DATA TIDAK BERHASIL DI DELETE");
                window.location.href="?page=lokasiBuku";
            </script>
            <?php

        }

    }
?>