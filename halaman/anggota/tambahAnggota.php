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

<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">

     <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Data Anggota
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="POST" onsubmit="return validasi(this)">

                                <div class="form-group">
                                    <label>NIS</label>
                                    <input class="form-control" name="nis" id="nis" />
                                </div>

                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input class="form-control" name="nama" id="nama" />
                                </div>

                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input class="form-control" name="tempat_lahir" id="tempat_lahir" />
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" />
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jk" id="jk" value="Laki-Laki"/>Laki-Laki
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jk" id="jk" value="Perempuan"/>Perempuan
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option>== Pilih Kelas ==</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                        <option value="VI">VI</option>
                                    </select>
                                </div>

                                <div>
                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

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
if (isset($_POST['simpan'])) {

        // ambil data dari formulir :
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];

        // buat query
    $sql = "INSERT INTO tb_anggota (nis,nama,tempat_lahir,tgl_lahir,jk,kelas) VALUES ('$nis','$nama','$tempat_lahir','$tgl_lahir','$jk','$kelas')";
    $query = mysqli_query($koneksi,$sql);

        // apakah query simpan berhasil ?
    if ($query) {
        ?>
        <script type="text/javascript">
            alert("DATA BERHASIL DI SIMPAN");
            window.location.href="?page=anggota";
        </script>
        <?php
    } else {

        ?>
        <script type="text/javascript">
            alert("DATA TIDAK BERHASIL DI SIMPAN");
            window.location.href="?page=anggota";
        </script>
        <?php

    }

}
?>

