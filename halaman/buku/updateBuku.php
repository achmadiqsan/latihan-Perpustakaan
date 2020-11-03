<script type="text/javascript">
    function validasi(form){
        if (form.judul.value=="") {
            alert("Judul Tidak Boleh Kosong");
            form.judul.focus();
            return (false);
        }
        if (form.pengarang.value=="") {
            alert("Pengarang Tidak Boleh Kosong");
            form.pengarang.focus();
            return (false);
        }
        if (form.penerbit.value=="") {
            alert("Penerbit Tidak Boleh Kosong");
            form.penerbit.focus();
            return (false);
        }
        if (form.tahun_terbit.value=="") {
            alert("Tahun Terbit Tidak Boleh Kosong");
            form.tahun_terbit.focus();
            return (false);
        }
        if (form.isbn.value=="") {
            alert("ISBN Tidak Boleh Kosong");
            form.isbn.focus();
            return (false);
        }
        if (form.jumlah_buku.value=="") {
            alert("Jumlah Buku Tidak Boleh Kosong");
            form.jumlah_buku.focus();
            return (false);
        }
        if (form.lokasi.value=="") {
            alert("Lokasi Tidak Boleh Kosong");
            form.lokasi.focus();
            return (false);
        }
        return(true); 
    }
</script>

<?php 

  // kalau tidak ada id di query string
if (!isset($_GET['id_buku'])) {
    header('Location: ?page=buku');
}

  // ambil id dari query string
$id_buku = $_GET['id_buku'];

  // buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_buku WHERE id_buku=$id_buku";
$query = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_assoc($query);

$lokasi = $data['lokasi'];

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
                    Update Data Buku
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="POST" onsubmit="return validasi(this)">

                                <div class="form-group">
                                    <label>ID Buku</label>
                                    <input class="form-control" name="id_buku" id="id_buku" value="<?php echo $data['id_buku']; ?>" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input class="form-control" name="judul" id="judul" value="<?php echo $data['judul']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input class="form-control" name="pengarang" id="pengarang" value="<?php echo $data['pengarang']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input class="form-control" name="penerbit" id="penerbit" value="<?php echo $data['penerbit']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Tahun Terbit</label>
                                    <select class="form-control" name="tahun_terbit" id="tahun_terbit">
                                        <?php 

                                        $tahun = date("Y");
                                        for ($i = $tahun-29; $i <= $tahun; $i++) {
                                            if ($i==$data['tahun_terbit']) {
                                                echo '
                                                <option value="'.$i.'"selected>'.$i.'</option>
                                                ';
                                            } else {
                                                echo '
                                                <option value="'.$i.'">'.$i.'</option>
                                                ';    
                                            }
                                            
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input class="form-control" name="isbn" id="isbn" value="<?php echo $data['isbn']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Buku</label>
                                    <input type="number" class="form-control" name="jumlah_buku" id="jumlah_buku" value="<?php echo $data['jumlah_buku']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select class="form-control" name="lokasi" id="lokasi">
                                        <option>== PILIH LOKASI ==</option>

                                        <?php 

                                        $sql = "SELECT * FROM tb_lokasi ORDER BY id_lokasi";

                                        $query = mysqli_query($koneksi,$sql);

                                        while ($data = mysqli_fetch_assoc($query)) { if ($lokasi == $data['lokasi']) {
                                            $ket ="selected";
                                        } else {
                                            $ket ="";
                                        } ?>
                                        <option <?php echo $ket; ?> value="<?php echo $data['lokasi']; ?>"><?php echo $data['lokasi']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div>
                                <input type="submit" name="update" value="Update" class="btn btn-primary">

                                <a href="index.php?page=buku" class="btn btn-warning"> Kembali</a>
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
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $isbn = $_POST['isbn'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $lokasi = $_POST['lokasi'];

        // buat query
    $sql = "UPDATE tb_buku SET judul='$judul',pengarang='$pengarang',penerbit='$penerbit',tahun_terbit='$tahun_terbit',isbn='$isbn',jumlah_buku='$jumlah_buku',lokasi='$lokasi' WHERE id_buku ='$id_buku'";

    $query = mysqli_query($koneksi,$sql);

        // apakah query simpan berhasil ?
    if ($query) {
        ?>
        <script type="text/javascript">
            alert("DATA BERHASIL DI SIMPAN");
            window.location.href="?page=buku";
        </script>
        <?php
    } else {

        ?>
        <script type="text/javascript">
            alert("DATA TIDAK BERHASIL DI SIMPAN");
            window.location.href="?page=buku";
        </script>
        <?php

    }

}
?>

