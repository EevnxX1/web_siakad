<?php
include "../koneksi.php";
$query = mysqli_query($con, "SELECT * FROM tbl_mahasiswa WHERE id_mhs = '$_GET[idm]'");
$data_file = mysqli_fetch_array($query);
unlink("../assets/foto_mahasiswa/".$data_file['foto']);

mysqli_query($con, "DELETE FROM tbl_mahasiswa WHERE id_mhs = '$_GET[idm]'");

echo "<script>
alert('Data Berhasil Di Hapus')
document.location='index.php?page=data_mahasiswa'
</script>";
?>