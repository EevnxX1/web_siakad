 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">jadwal perkuliahan Dosen</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Ruangan</th>
                                            <th>Nama Kelas</th>
                                            <th>Nama Matakuliah</th>
                                            <th>Nama Dosen</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Ruangan</th>
                                            <th>Nama Kelas</th>
                                            <th>Nama Matakuliah</th>
                                            <th>Nama Dosen</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
include"../koneksi.php";
$no=1;
$sqljadwal = mysqli_query($con,"Select * from tbl_jadwal INNER JOIN tbl_kelas ON tbl_jadwal.id_kelas = tbl_kelas.id_kelas INNER JOIN tbl_dosen ON tbl_jadwal.id_dosen = tbl_dosen.id_dosen INNER JOIN tbl_matkul ON tbl_jadwal.id_matkul = tbl_matkul.id_matkul WHERE tbl_dosen.nidn_dosen = '$_SESSION[nidndosen]'");
while($rjadwal = mysqli_fetch_array($sqljadwal)){
?>
                                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$rjadwal[hari]"; ?></td>
                                            <td><?php echo"$rjadwal[jam]"; ?></td>
                                            <td><?php echo"$rjadwal[ruangan]"; ?></td>
                                            <td><?php echo"$rjadwal[nm_kelas]"; ?></td>
                                            <td><?php echo"$rjadwal[nm_matkul]"; ?></td>
                                            <td><?php echo"$rjadwal[nm_dosen]"; ?></td>
                                            <td>
                                                <a class="btn btn-warning" href="<?= "index.php?page=nilai_mahasiswa&idk=$rjadwal[id_kelas]&&idm=$rjadwal[id_matkul]" ?>">Nilai</a>
                                            </td>
                                        </tr>
<?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>