<?php
include "../koneksi.php";
$sqlks = mysqli_query($con, "SELECT * FROM tbl_kelas WHERE id_kelas = $_GET[idk]");
$rkls = mysqli_fetch_array($sqlks);

$sqlmatkul = mysqli_query($con, "SELECT * FROM tbl_matkul WHERE id_matkul = $_GET[idm]");
$rmatkul = mysqli_fetch_array($sqlmatkul);
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Nilai Matakuliah Mahasiswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
<form action="" method="post">
    <label>Kode Kelas : <?= "$rkls[kd_kelas]" ?></label><br>
    <label>Nama Kelas : <?= "$rkls[nm_kelas]" ?></label><br>
    <label>Semester : <?= "$rkls[semester]" ?></label><br>
    <label>Nama Matakuliah : <?= "$rmatkul[nm_matkul]" ?></label><br>
    <p></p>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM Mahasiswa</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jurusan</th>
                                            <th>Status</th>
                                            <th>Absensi</th>
                                            <th>Quiz</th>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            <th>Nilai Akhir</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM Mahasiswa</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jurusan</th>
                                            <th>Status</th>
                                            <th>Absensi</th>
                                            <th>Quiz</th>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            <th>Nilai Akhir</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
include"../koneksi.php";
$no=1;
$sqlmhs = mysqli_query($con,"SELECT * FROM tbl_kelas_detail1 INNER JOIN tbl_kelas ON tbl_kelas_detail1.id_kelas = tbl_kelas.id_kelas INNER JOIN tbl_mahasiswa on tbl_kelas_detail1.id_mhs = tbl_mahasiswa.id_mhs WHERE tbl_kelas.id_kelas = '$_GET[idk]'");
while($rmhs = mysqli_fetch_array($sqlmhs)){
?>
                                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$rmhs[nim_mhs]"; ?></td>
                                            <td><?php echo"$rmhs[nm_mhs]"; ?></td>
                                            <td><?php echo"$rmhs[jurusan]"; ?></td>
                                            <td><?php echo"$rmhs[status]"; ?></td>
                                            <td>
                                                <input type="text" class="form-control" name="absensi[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="quis[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="uts[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="uas[]">
                                                <input type="hidden" class="form-control" name="id_kelas[]" value="<?= "$_GET[idk]" ?>">
                                                <input type="hidden" class="form-control" name="id_matkul[]" value="<?= "$_GET[idm]" ?>">
                                                <input type="hidden" class="form-control" name="id_mahasiswa[]" value="<?= "$rmhs[id_mhs]" ?>">
                                            </td>
                                            <td>0,0</td>
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

    $idmhs = $_POST["id_mahasiswa"];
    $idk = $_POST["id_kelas"];
    $idmk = $_POST["id_matkul"];
    $absensi = $_POST["absensi"];
    $quis = $_POST["quis"];
    $uts = $_POST["uts"];
    $uas = $_POST["uas"];

    $jumlah = count($uas);
    
    for ($i=0; $i < $jumlah; $i++) { 
        $akhir = ($absensi[$i] * 0.1) + ($quis[$i] * 0.2) + ($uts[$i] * 0.3) + ($uas[$i] * 0.4);
    $query = mysqli_query($con,"insert into tbl_nilai(id_kelas, id_matkul, id_mahasiswa, nabsensi, nquis, nuts, nuas, nakhir) values ('$idk[$i]', '$idmk[$i]', '$idmhs[$i]', '$absensi[$i]', '$quis[$i]', '$uts[$i]', '$uas[$i]', '$akhir')");
    }

    echo "<script>
    alert('Data Berhasil Disimpan!');
    document.location='index.php?page=jadwal_perkuliahan';
    </script>";
}
?>