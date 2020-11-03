<?php

        // cek apakah tombol daftar sudah diklik atau belum ?
if (isset($_GET['nis'])) {
    
        // ambil data dari formulir :
    $nis = $_GET['nis'];

        // buat query hapus
    $sql = "DELETE FROM tb_anggota WHERE nis=$nis";
    $query = mysqli_query($koneksi,$sql);

        // apakah query simpan berhasil ?
    if ($query) {
        ?>
        <script type="text/javascript">
            alert("DATA BERHASIL DI DELETE");
            window.location.href="?page=anggota";
        </script>
        <?php
    } else {

        ?>
        <script type="text/javascript">
            alert("DATA TIDAK BERHASIL DI DELETE");
            window.location.href="?page=anggota";
        </script>
        <?php

    }

}
?>