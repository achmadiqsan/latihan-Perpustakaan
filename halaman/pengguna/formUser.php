<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>DATA USER</h2>   
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                     DATA PENGGUNA
                 </div>
                 <div class="panel-body">
                    <div class="table-responsive">

                        <div>
                            <a href="index.php?page=tambahUser" class="btn btn-success"><i class=" fa fa-plus "></i> Tambah Data</a>
                        </div><br>

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th>Foto</th>
                                    <th width="21%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                             <?php 

                    //query ke database dg SELECT
                             $sql = "SELECT * FROM tb_user";
                             $query = mysqli_query($koneksi,$sql);

                    //else ini artinya jika data hasil query ada (data diu database tidak kosong)

                    //jika data tidak kosong, maka akan melakukan perulangan while
                    $no = 0; //membuat variabel $no untuk membuat nomor urut

                    while ($data = mysqli_fetch_array($query)) { //perulangan while dg membuat variabel $data yang akan mengambil data di database


                        $id = $data['id'];
                        $username = $data['username'];
                        $password = $data['password'];
                        $nama = $data['nama'];
                        $level = $data['level'];
                        $foto = $data['foto'];

                      $no++;  //menambah jumlah nomor urut setiap row


                      ?>

                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $level; ?></td>
                        <td> <img src="images/<?php echo $foto; ?>" width="75" height="75" align="center"> </td>
                        <td>
                          <a href="?page=updateUser&id=<?php echo $id; ?>" class="btn btn-warning"><i class="fa fa-edit "></i>UPDATE </a>   <a onclick="return confirm('Yakin Hapus Data ?')" href="?page=hapusUser&id=<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</a>
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