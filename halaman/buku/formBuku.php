<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>DATA BUKU</h2>   
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                     DATA BUKU
                 </div>
                 <div class="panel-body">
                    <div class="table-responsive">

                        <div>
                            <a href="index.php?page=tambahBuku" class="btn btn-success"><i class=" fa fa-plus "></i> Tambah Data</a>
                        </div><br>

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Tahun</th>
                                    <th>ISBN</th>
                                    <th>Jumlah</th>
                                    <th>Lokasi</th>
                                    <th width="21%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                    //query ke database dg SELECT
                                $sql = "SELECT * FROM tb_buku";
                                $query = mysqli_query($koneksi,$sql);

                    //else ini artinya jika data hasil query ada (data diu database tidak kosong)

                    //jika data tidak kosong, maka akan melakukan perulangan while
                    $no = 0; //membuat variabel $no untuk membuat nomor urut

                    while ($data = mysqli_fetch_array($query)) { //perulangan while dg membuat variabel $data yang akan mengambil data di database


                        $judul = $data['judul'];
                        $pengarang = $data['pengarang'];
                        $penerbit = $data['penerbit'];
                        $tahun_terbit = $data['tahun_terbit'];
                        $isbn = $data['isbn'];
                        $jumlah_buku = $data['jumlah_buku'];
                        $lokasi = $data['lokasi'];

                      $no++;  //menambah jumlah nomor urut setiap row


                      ?>

                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $judul; ?></td>
                        <td><?php echo $pengarang; ?></td>
                        <td><?php echo $penerbit; ?></td>
                        <td><?php echo $tahun_terbit; ?></td>
                        <td><?php echo $isbn; ?></td>
                        <td><?php echo $jumlah_buku; ?></td>
                        <td><?php echo $lokasi; ?></td>
                        <td>
                            <a href="?page=updateBuku&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-warning"><i class="fa fa-edit "></i>UPDATE </a>   <a onclick="return confirm('Yakin Hapus Data ?')" href="?page=hapusBuku&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</a>
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