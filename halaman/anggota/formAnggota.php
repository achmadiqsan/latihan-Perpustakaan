<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>DATA ANGGOTA</h2>   
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                     DATA ANGGOTA
                 </div>
                 <div class="panel-body">
                    <div class="table-responsive">

                        <div>
                            <a href="index.php?page=tambahAnggota" class="btn btn-success"><i class=" fa fa-plus "></i> Tambah Data</a>
                        </div><br>

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th width="23%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                    //query ke database dg SELECT
                                $sql = "SELECT * FROM tb_anggota";
                                $query = mysqli_query($koneksi,$sql);

                    //else ini artinya jika data hasil query ada (data diu database tidak kosong)

                    //jika data tidak kosong, maka akan melakukan perulangan while
                    $no = 0; //membuat variabel $no untuk membuat nomor urut

                    while ($data = mysqli_fetch_array($query)) { //perulangan while dg membuat variabel $data yang akan mengambil data di database


                        $nis = $data['nis'];
                        $nama = $data['nama'];
                        $tempat_lahir = $data['tempat_lahir'];
                        $tgl_lahir = $data['tgl_lahir'];
                        $jk = $data['jk'];
                        $kelas = $data['kelas'];

                      $no++;  //menambah jumlah nomor urut setiap row


                      ?>

                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $nis; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $tempat_lahir; ?></td>
                        <td><?php echo $tgl_lahir; ?></td>
                        <td><?php echo $jk; ?></td>
                        <td><?php echo $kelas; ?></td>
                        <td>
                            <a href="?page=updateAnggota&nis=<?php echo $nis; ?>" class="btn btn-warning"><i class="fa fa-edit "></i>UPDATE </a>   <a onclick="return confirm('Yakin Hapus Data ?')" href="?page=hapusAnggota&nis=<?php echo $nis; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</a>
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