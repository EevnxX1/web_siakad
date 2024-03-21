<?php
include "../koneksi.php";
$query = mysqli_query($con, "SELECT * FROM tbl_dosen WHERE id_dosen = '$_GET[ids]'");
$hapus = mysqli_fetch_array($query);
unlink("../assets/foto_dosen/".$hapus['foto']);

mysqli_query($con, "DELETE FROM tbl_dosen WHERE id_dosen = '$_GET[ids]'");
echo "<script>
alert('Data Dosen Berhasil Dihapus')
document.location='index.php?page=data_dosen'
</script>";
?>