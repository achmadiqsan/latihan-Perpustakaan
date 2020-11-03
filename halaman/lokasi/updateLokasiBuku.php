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


<?php 

  // kalau tidak ada id di query string
if (!isset($_GET['id_lokasi'])) {
  header('Location: ?page=?page=lokasiBuku');
}

  // ambil id dari query string
$id_lokasi = $_GET['id_lokasi'];

  // buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_lokasi WHERE id_lokasi=$id_lokasi";
$query = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_assoc($query);

  // jika data yang di edit tidak ditemukan
if (mysqli_num_rows($query) < 1 ) {
  die("data tidak ditemukan...");
}


?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">

     <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Data Lokasi Buku
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="POST" onsubmit="return validasi(this)">

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_lokasi" id="id_lokasi" value=" <?php echo $data['id_lokasi']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Lokasi Buku</label>
                                    <input class="form-control" name="lokasi" id="lokasi" value=" <?php echo$data['lokasi']; ?>"/>
                                </div>

                                <div>
                                    <input type="submit" name="update" value="Update" class="btn btn-primary">

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
    if (isset($_POST['update'])) {
        
        // ambil data dari formulir :
    //    $id_lokasi = $_POST['id_lokasi']
        $lokasi = $_POST['lokasi'];

        // buat query
        $sql = "UPDATE tb_lokasi SET lokasi='$lokasi' WHERE id_lokasi='$id_lokasi'";
        $query = mysqli_query($koneksi,$sql);

        // apakah query simpan berhasil ?
        if ($query) {
            ?>
            <script type="text/javascript">
                alert("DATA BERHASIL DI UPDATE");
                window.location.href="?page=lokasiBuku";
            </script>
            <?php
        } else {

            ?>
            <script type="text/javascript">
                alert("DATA TIDAK BERHASIL DI UPDATE");
                window.location.href="?page=lokasiBuku";
            </script>
            <?php

        }

    }
?>

