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
        if (form.foto.value=="") {
            alert("Foto Tidak Boleh Kosong");
            form.foto.focus();
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
                    Tambah Data User
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">

                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username" id="username" />
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" id="password" />
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input class="form-control" name="nama" id="nama" />
                                </div>

                                <div class="form-group">
                                    <label>Level Akses</label>
                                    <select class="form-control" name="level">
                                        <option>== PILIH AKSES LEVEL ==</option>
                                        <option value="admin">ADMIN</option>
                                        <option value="user">USER</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file" name="foto" id="foto" />
                                </div>

                                <div>
                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

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
if (isset($_POST['simpan'])) {

        // ambil data dari formulir :
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];


    $foto = $_FILES['foto']['name'];
    $lokasiFoto = $_FILES['foto']['tmp_name'];

        // buat query
    $sql = "INSERT INTO tb_user (username,password,nama,level,foto) VALUES ('$username','$password','$nama','$level','$foto')";
    $query = mysqli_query($koneksi,$sql);

    move_uploaded_file($lokasiFoto, "images/".$foto);



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

}
?>

