<?php 
error_reporting(0);
session_start();

$koneksi = new mysqli("localhost","root","","db_perpustakaan1");

include 'function.php';

if ($_SESSION['admin'] || $_SESSION['user']) {

 ?>


 <!DOCTYPE html>
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>APLIKASI PERPUSTAKAAN</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">PERPUSTAKAAN</a> 
      </div>
      <div style="color: white;
      padding: 15px 50px 5px 50px;
      float: right;
      font-size: 16px;"> <?php echo date('d M Y'); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
    </nav>   
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

          <li>
            <a  href="index.php?page=home"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
          </li>	

          <li>
            <a href="#"><i class="fa fa-laptop fa-2x"></i> Data Master<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="index.php?page=lokasiBuku">Data Lokasi Buku</a>
              </li>
              <li>
                <a href="index.php?page=buku">Data Buku</a>
              </li>
              <li>
                <a href="index.php?page=anggota">Data Anggota</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="index.php?page=transaksi"><i class="fa fa-edit fa-2x"></i> Transaksi</a>
          </li>

          <?php if ($_SESSION['admin']) { ?>

            <li>
              <a href="index.php?page=user"><i class="fa fa-user fa-2x"></i> Data Pengguna</a>
            </li>

            <li>
              <a href="#"><i class="fa fa-calendar fa-2x"></i> Laporan<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="index.php?page=formLapAnggota">Laporan Data Anggota</a>
                </li>
                <li>
                  <a href="index.php?page=formLapBuku">Laporan Data Buku</a>
                </li>
                <li>
                  <a href="index.php?page=formLapTransaksi">Laporan Transaksi</a>
                </li>
              </ul>
            </li>

          <?php } ?>

        </ul>

      </div>

    </nav>  
    <!-- /. NAV SIDE  -->

    <?php 

    if (isset($_GET['page'])) {
      $page = $_GET['page'];

      switch ($page) {
        case home:
        include 'home.php';
        break;

        case lokasiBuku:
        include 'halaman/lokasi/formLokasiBuku.php';
        break;

        case tambahLokasi:
        include 'halaman/lokasi/tambahLokasiBuku.php';
        break;

        case updateLokasi:
        include 'halaman/lokasi/updateLokasiBuku.php';
        break;

        case hapusLokasi:
        include 'halaman/lokasi/hapusLokasiBuku.php';
        break;

        case buku:
        include 'halaman/buku/formBuku.php';
        break;

        case tambahBuku:
        include 'halaman/buku/tambahBuku.php';
        break;

        case updateBuku:
        include 'halaman/buku/updateBuku.php';
        break;

        case hapusBuku:
        include 'halaman/buku/hapusBuku.php';
        break;

        case anggota:
        include 'halaman/anggota/formAnggota.php';
        break;

        case tambahAnggota:
        include 'halaman/anggota/tambahAnggota.php';
        break;

        case updateAnggota:
        include 'halaman/anggota/updateAnggota.php';
        break;

        case hapusAnggota:
        include 'halaman/anggota/hapusAnggota.php';
        break;

        case transaksi:
        include 'halaman/transaksi/formTransaksi.php';
        break;

        case tambahtransaksi:
        include 'halaman/transaksi/tambahTransaksi.php';
        break; 

        case kembali:
        include 'halaman/transaksi/kembali.php';
        break; 

        case perpanjang:
        include 'halaman/transaksi/perpanjang.php';
        break;

        case user:
        include 'halaman/pengguna/formUser.php';
        break;

        case tambahUser:
        include 'halaman/pengguna/tambahUser.php';
        break;

        case updateUser:
        include 'halaman/pengguna/updateUser.php';
        break;

        case hapusUser:
        include 'halaman/pengguna/hapusUser.php';
        break;

        case formLapAnggota:
        include 'halaman/anggota/formLapAnggota.php';
        break;

        case formLapBuku:
        include 'halaman/buku/formLapBuku.php';
        break;

        case formLapTransaksi:
        include 'halaman/transaksi/formLapTransaksi.php';
        break;

        default:
        include 'notfound.php';
        break;
      }
    } else {
      include 'home.php';
    }


    ?>


  </div>
  <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
  $(document).ready(function () {
    $('#dataTables-example').dataTable();
  });
</script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>
</html>

<?php 

} else {
  header("Location:login.php");
}



?>