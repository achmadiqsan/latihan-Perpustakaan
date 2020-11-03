<script type="text/javascript">
    function validasi(form){
        if (form.nis.value=="") {
            alert("NIS Tidak Boleh Kosong");
            form.nis.focus();
            return (false);
        }
        if (form.nama.value=="") {
            alert("Nama Tidak Boleh Kosong");
            form.nama.focus();
            return (false);
        }
        if (form.tempat_lahir.value=="") {
            alert("Tempat Lahir Buku Tidak Boleh Kosong");
            form.tempat_lahir.focus();
            return (false);
        }
        if (form.jk.value=="") {
            alert("jk Tidak Boleh Kosong");
            form.jk.focus();
            return (false);
        }
        if (form.kelas.value=="") {
            alert("kelas Tidak Boleh Kosong");
            form.kelas.focus();
            return (false);
        }
        return(true); 
    }
</script>

<?php 

  // kalau tidak ada id di query string
if (!isset($_GET['nis'])) {
  header('Location: ?page=?page=anggota');
}

  // ambil id dari query string
$nis = $_GET['nis'];

  // buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_anggota WHERE nis=$nis";
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
                    Update Data Anggota
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="POST" onsubmit="return validasi(this)">

                                <div class="form-group">
                                    <label>NIS</label>
                                    <input class="form-control" name="nis" id="nis" value="<?php echo $data['nis']; ?>" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input class="form-control" name="nama" id="nama" value="<?php echo $data['nama']; ?>"/>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>"/>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>"/>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jk" id="jk" value="Laki-Laki" <?php echo($data['jk']==Laki-Laki)?"checked":""; ?>/>Laki-Laki
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jk" id="jk" value="Perempuan" <?php echo($data['jk']==Perempuan)?"checked":""; ?>/>Perempuan
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option>== Pilih Kelas ==</option>
                                        <option value="I" <?php if ($data['kelas']=='I') {echo "selected";} ?>>I</option>

                                        <option value="II" <?php if ($data['kelas']=='II') {echo "selected";} ?>>II</option>

                                        <option value="III" <?php if ($data['kelas']=='III') {echo "selected";} ?>>III</option>

                                        <option value="IV" <?php if ($data['kelas']=='IV') {echo "selected";} ?>>IV</option>

                                        <option value="V" <?php if ($data['kelas']=='V') {echo "selected";} ?>>V</option>

                                        <option value="VI" <?php if ($data['kelas']=='VI') {echo "selected";} ?>>VI</option>
                                    </select>
                                </div>

                                <div>
                                    <input type="submit" name="update" value="Update" class="btn btn-primary">

                                    <a href="index.php?page=anggota" class="btn btn-warning"> Kembali</a>
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
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];

        // buat query
    $sql = "UPDATE tb_anggota SET nama='$nama',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',jk='$jk',kelas='$kelas' WHERE nis='$nis'";
    $query = mysqli_query($koneksi,$sql);

        // apakah query simpan berhasil ?
    if ($query) {
        ?>
        <script type="text/javascript">
            alert("DATA BERHASIL DI UPDATE");
            window.location.href="?page=anggota";
        </script>
        <?php
    } else {

        ?>
        <script type="text/javascript">
            alert("DATA TIDAK BERHASIL DI UPDATE");
            window.location.href="?page=anggota";
        </script>
        <?php

    }

}
?>

