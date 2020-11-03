<script type="text/javascript">
    function validasi(form){
        if (form.lokasiBuku.value=="") {
            alert("Lokasi Buku Tidak Boleh Kosong");
            form.lokasiBuku.focus();
            return (false);
        }
        return(true); 
    }
</script>

<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">

       <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Data Lokasi Buku
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="POST" onsubmit="return validasi(this)">
                                <div class="form-group">
                                    <label>Lokasi Buku</label>
                                    <input class="form-control" name="lokasi" id="lokasi" />
                                </div>

                                <div>
                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                                    <a href="index.php?page=lokasiBuku" class="btn btn-warning"> Kembali</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements -->
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
</div>

<?php

        // cek apakah tombol daftar sudah diklik atau belum ?
    if (isset($_POST['simpan'])) {
        
        // ambil data dari formulir :
        $lokasi = $_POST['lokasi'];

        // buat query
        $sql = "INSERT INTO tb_lokasi (lokasi) VALUES ('$lokasi')";
        $query = mysqli_query($koneksi,$sql);

        // apakah query simpan berhasil ?
        if ($query) {
            ?>
            <script type="text/javascript">
                alert("DATA BERHASIL DI SIMPAN");
                window.location.href="?page=lokasiBuku";
            </script>
            <?php
        } else {

            ?>
            <script type="text/javascript">
                alert("DATA TIDAK BERHASIL DI SIMPAN");
                window.location.href="?page=lokasiBuku";
            </script>
            <?php

        }

    }
?>

