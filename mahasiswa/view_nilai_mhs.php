<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kartu Hasil Studi (KHS)</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
    <?php
    include "../koneksi.php";
    $sql = mysqli_query($con, "SELECT * FROM tbl_nilai INNER JOIN tbl_mahasiswa ON tbl_nilai.id_mahasiswa = tbl_mahasiswa.id_mhs INNER JOIN tbl_kelas ON tbl_nilai.id_kelas = tbl_kelas.id_kelas INNER JOIN tbl_jurusan ON tbl_kelas.id_jurusan = tbl_jurusan.id_jurusan WHERE tbl_mahasiswa.id_mhs = '$ru[id_mhs]'");
    $data1 = $sql -> fetch_array();
    ?>
    <label>Nama Mahasiswa : <?= "$data1[nm_mhs]" ?></label><br>
    <label>Program Studi : <?= "$data1[nm_jurusan]" ?></label><br>
    <label>Nim Mahasiswa : <?= "$data1[nim_mhs]" ?></label><br>
    <label>Kode Kelas : <?= "$data1[kd_kelas]" ?></label><br>
    <label>Nama Kelas : <?= "$data1[nm_kelas]" ?></label>
    <p></p>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode</th>
                                            <th>Nama MataKuliah</th>
                                            <th>SKS</th>
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
                                            <th>Kode</th>
                                            <th>Nama MataKuliah</th>
                                            <th>SKS</th>
                                            <th>Absensi</th>
                                            <th>Quiz</th>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            <th>Nilai Akhir</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
include "../koneksi.php";
$no=1;
$query = mysqli_query($con, "SELECT * FROM tbl_nilai INNER JOIN tbl_matkul ON tbl_nilai.id_matkul = tbl_matkul.id_matkul INNER JOIN tbl_mahasiswa ON tbl_nilai.id_mahasiswa = tbl_mahasiswa.id_mhs WHERE tbl_mahasiswa.id_mhs = '$ru[id_mhs]'");
while($data2 = mysqli_fetch_array($query)) {
?>
                                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$data2[kd_matkul]"; ?></td>
                                            <td><?php echo"$data2[nm_matkul]"; ?></td>
                                            <td><?php echo"$data2[sks]"; ?></td>
                                            <td><?php echo"$data2[nabsensi]"; ?></td>
                                            <td><?php echo"$data2[nquis]"; ?></td>
                                            <td><?php echo"$data2[nuts]"; ?></td>
                                            <td><?php echo"$data2[nuas]"; ?></td>
                                            <td><?php echo"$data2[nakhir]"; ?></td>
                                        </tr>
<?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
