<script type="text/javascript">
    function validasi(form){
        if (form.username.value=="") {
            alert("Username Tidak Boleh Kosong");
            form.username.focus();
            return (false);
        }
        if (form.password.value=="") {
            alert("Password Tidak Boleh Kosong");
            form.password.focus();
            return (false);
        }
        if (form.nama.value=="") {
            alert("Nama Tidak Boleh Kosong");
            form.nama.focus();
            return (false);
        }
        return(true); 
    }
</script>

<?php 

  // kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: ?page=user');
}

  // ambil id dari query string
$id = $_GET['id'];

  // buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_user WHERE id=$id";
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
                    Update Data User
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username" id="username" value="<?php echo $data['username']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" id="password" value="<?php echo $data['password']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input class="form-control" name="nama" id="nama" value="<?php echo $data['nama']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Level Akses</label>
                                    <input class="form-control" name="level" id="level" value="<?php echo $data['level']; ?>" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Foto</label><br>
                                    <label> <img src='images/<?php echo $data['foto']; ?>' width="100" height="100"> </label>
                                </div>

                                <div class="form-group">
                                    <label>Ganti Foto</label>
                                    <input type="file" name="foto" id="foto" />
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="fotoLama" id="fotoLama" value="<?php echo $data['foto']; ?>" />
                                </div>

                                <div>
                                    <input type="submit" name="update" value="Update" class="btn btn-primary">

                                    <a href="index.php?page=user" class="btn btn-warning"> Kembali</a>
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
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];
    


    $foto = $_FILES['foto']['name'];
    $lokasiFoto = $_FILES['foto']['tmp_name'];

    $Lama = $_POST['fotoLama'];

    if (!empty($lokasiFoto)) {

        unlink("images/$Lama");

        move_uploaded_file($lokasiFoto, "images/".$foto);

        $sql = " UPDATE tb_user SET username='$username',password='$password',nama='$nama',level='$level',foto='$foto' WHERE id='$id' ";

        $query = mysqli_query($koneksi,$sql);

        // apakah query simpan berhasil ?
        if ($query) {
            ?>
            <script type="text/javascript">
                alert("DATA BERHASIL DI SIMPAN");
                window.location.href="?page=user";
            </script>
            <?php
        } else {

            ?>
            <script type="text/javascript">
                alert("DATA TIDAK BERHASIL DI SIMPAN");
                window.location.href="?page=user";
            </script>
            <?php

        }
    } else {
        $sql = " UPDATE tb_user SET username='$username',password='$password',nama='$nama',level='$level' WHERE id='$id' ";

        $query = mysqli_query($koneksi,$sql);

        if ($query) {
            ?>
            <script type="text/javascript">
                alert("DATA BERHASIL DI SIMPAN");
                window.location.href="?page=user";
            </script>
            <?php
        } else {

            ?>
            <script type="text/javascript">
                alert("DATA TIDAK BERHASIL DI SIMPAN");
                window.location.href="?page=user";
            </script>
            <?php

        }
    }

}
?>
