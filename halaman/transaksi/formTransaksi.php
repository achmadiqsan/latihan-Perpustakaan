<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>DATA TRANSAKSI PEMINJAMAN BUKU</h2>   
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                     DATA TRANSAKSI PEMINJAMAN BUKU
                 </div>
                 <div class="panel-body">
                    <div class="table-responsive">

                        <div>
                            <a href="index.php?page=tambahtransaksi" class="btn btn-success"><i class=" fa fa-plus "></i> Tambah Data</a>
                        </div><br>

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Terlambat</th>
                                    <th width="21%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                             <?php 

                             $sql = "SELECT * FROM tb_transaksi";
                             $query = mysqli_query($koneksi,$sql);
                    $no = 0; 

                    while ($data = mysqli_fetch_array($query)) { 

                        $id = $data['id'];
                        $id_buku = $data['id_buku'];
                        $judul = $data['judul'];
                        $nis = $data['nis'];
                        $nama = $data['nama'];
                        $tgl_pinjam = $data['tgl_pinjam'];
                        $tgl_kembali = $data['tgl_kembali'];
                        $status = $data['status'];

                      $no++; 

                      ?>

                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $judul; ?></td>
                        <td><?php echo $nis; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $tgl_pinjam; ?></td>
                        <td><?php echo $tgl_kembali; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><?php 

                            $tangal_dateline = $data['tgl_kembali'];
                            $tgl_kembali = date('Y-m-d');
                            $lambat = terlambat($tangal_dateline,$tgl_kembali);

                            if ($lambat>0) {
                                echo "<font color='red'> $lambat Hari </font>";
                            } else {
                                echo $lambat . " Hari";
                            }

                            ?>  
                        </td>
                        <td>
                          <a href="?page=kembali&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul']; ?>" class="btn btn-info">Kembali </a>   
                          <a href="?page=perpanjang&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul']; ?>&tgl_kembali=<?php echo $data['tgl_kembali']; ?>&lambat=<?php echo $lambat; ?>" class="btn btn-danger"> Perpanjang</a>
                      </tr>

                  <?php } ?>

              </tbody>
          </table>
      </div>

  </div>
</div>
<!--End Advanced Tables -->
</div>
</div>

</div>
<!-- /. PAGE INNER  -->
</div>