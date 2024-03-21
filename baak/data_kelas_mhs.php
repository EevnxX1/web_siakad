<?php
include "../koneksi.php";
$sqlks = mysqli_query($con, "SELECT * FROM tbl_kelas WHERE id_kelas = $_GET[idk]");
$rkls = mysqli_fetch_array($sqlks);
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
<form action="" method="post">
    <label>Kode Kelas : <?= "$rkls[kd_kelas]" ?></label><br>
    <label>Nama Kelas : <?= "$rkls[nm_kelas]" ?></label><br>
    <label>Semester : <?= "$rkls[semester]" ?></label>
    <p></p>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM Mahasiswa</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jurusan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM Mahasiswa</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jurusan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
include"../koneksi.php";
$no=1;
$sqlmhs = mysqli_query($con,"SELECT * FROM tbl_mahasiswa WHERE NOT EXISTS (SELECT * FROM  tbl_kelas_detail1 WHERE tbl_kelas_detail1.id_mhs = tbl_mahasiswa.id_mhs)");
while($rmhs = mysqli_fetch_array($sqlmhs)){
?>
                                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$rmhs[nim_mhs]"; ?></td>
                                            <td><?php echo"$rmhs[nm_mhs]"; ?></td>
                                            <td><?php echo"$rmhs[jurusan]"; ?></td>
                                            <td><?php echo"$rmhs[status]"; ?></td>
                                            <td>
                                                <input type="checkbox" name="id_mhs[]" value="<?= "$rmhs[id_mhs]" ?>">
                                                <input type="hidden" name="id_kelas[]" value="<?= "$_GET[idk]" ?>">
                                            </td>
                                        </tr>
<?php $no++; } ?>
                                    </tbody>
                                </table>
                                <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "../koneksi.php";

    $idm = $_POST["id_mhs"];
    $idk = $_POST["id_kelas"];
    $jumlah = count($idm);

    for ($i=0; $i < $jumlah; $i++) { 
    $query = mysqli_query($con,"insert into tbl_kelas_detail1(id_kelas, id_mhs) values ('$idk[$i]', '$idm[$i]')");
    }

    echo "<script>
    alert('Data Berhasil Disimpan!');
    document.location='index.php?page=data_kelas';
    </script>";
}
?>