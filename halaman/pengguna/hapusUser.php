<?php 

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_user WHERE id=$id";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_assoc($query);

    $foto = $data['foto'];
    $no = $data['id'];

    if (file_exists("images/$foto")) {
        unlink("images/$foto");
    }

    $sql = "DELETE FROM tb_user WHERE id=$no";
    $query = mysqli_query($koneksi,$sql);
}
?>

<script type="text/javascript">
    alert("DATA BERHASIL DI HAPUS");
    window.location.href="?page=user";
</script>
