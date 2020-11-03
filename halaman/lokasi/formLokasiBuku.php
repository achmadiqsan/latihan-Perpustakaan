<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>DATA LOKASI BUKU</h2>   
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DATA LOKASI BUKU
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">

                            <div>
                                <a href="index.php?page=tambahLokasi" class="btn btn-success"><i class=" fa fa-plus "></i> Tambah Data</a>
                            </div><br>


                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Lokasi</th>
                                        <th width="21%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 

                    //query ke database dg SELECT
                                    $sql = "SELECT * FROM tb_lokasi";
                                    $query = mysqli_query($koneksi,$sql);

                    //else ini artinya jika data hasil query ada (data diu database tidak kosong)

                    //jika data tidak kosong, maka akan melakukan perulangan while
                    $no = 0; //membuat variabel $no untuk membuat nomor urut

                    while ($data = mysqli_fetch_array($query)) { //perulangan while dg membuat variabel $data yang akan mengambil data di database


                        $id_lokasi = $data['id_lokasi'];
                        $lokasi = $data['lokasi'];

                      $no++;  //menambah jumlah nomor urut setiap row


                      ?>
                      <tr align="center">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $lokasi; ?></td>
                        <td>
                          <a href="?page=updateLokasi&id_lokasi=<?php echo $id_lokasi; ?>" class="btn btn-warning"><i class="fa fa-edit "></i>UPDATE </a>   <a onclick="return confirm('Yakin Hapus Data ?')" href="?page=hapusLokasi&id_lokasi=<?php echo $id_lokasi; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</a>
                      </td>
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