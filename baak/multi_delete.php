<?php
include "../koneksi.php";
if(isset($_POST['id'])) {
    foreach ($_POST['id'] as $id) {
        $query = "DELETE FROM tbl_mahasiswa WHERE id_mhs = ?";
        $del = $con->prepare($query);
        $del -> bind_param("i", $id);
        $del -> execute();
    }
}

echo "<script>
alert('Data Berhasil Di Hapus')
document.location='index.php?page=data_mahasiswa'
</script>";
?>