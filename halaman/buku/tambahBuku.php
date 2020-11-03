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

<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">

     <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Data Buku
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="POST" onsubmit="return validasi(this)">

                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input class="form-control" name="judul" id="judul" />
                                </div>

                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input class="form-control" name="pengarang" id="pengarang" />
                                </div>

                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input class="form-control" name="penerbit" id="penerbit" />
                                </div>

                                <div class="form-group">
                                    <label>Tahun Terbit</label>
                                    <select class="form-control" name="tahun_terbit" id="tahun_terbit">
                                        <?php 

                                        $tahun = date("Y");
                                        for ($i = $tahun-29; $i <= $tahun; $i++) {
                                            echo '
                                            <option value="'.$i.'">'.$i.'</option>
                                            ';
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input class="form-control" name="isbn" id="isbn" />
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Buku</label>
                                    <input type="number" class="form-control" name="jumlah_buku" id="jumlah_buku" />
                                </div>

                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select class="form-control" name="lokasi" id="lokasi">
                                        <option>== PILIH LOKASI ==</option>

                                        <?php 

                                        $sql = "SELECT * FROM tb_lokasi ORDER BY id_lokasi";

                                        $query = mysqli_query($koneksi,$sql);

                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <option value="<?php echo $data['lokasi']; ?>"><?php echo $data['lokasi']; ?></option>
                                            <?php
                                        }
                                        ?>
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
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $isbn = $_POST['isbn'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $lokasi = $_POST['lokasi'];

        // buat query
    $sql = "INSERT INTO tb_buku (judul,pengarang,penerbit,tahun_terbit,isbn,jumlah_buku,lokasi) VALUES ('$judul','$pengarang','$penerbit','$tahun_terbit','$isbn','$jumlah_buku','$lokasi')";
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

