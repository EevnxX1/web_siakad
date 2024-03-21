
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

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
$sqlmhs = mysqli_query($con,"SELECT * FROM tbl_kelas_detail1 INNER JOIN tbl_kelas ON tbl_kelas_detail1.id_kelas = tbl_kelas.id_kelas INNER JOIN tbl_mahasiswa ON tbl_kelas_detail1.id_mhs = tbl_mahasiswa.id_mhs
WHERE tbl_kelas_detail1.id_kelas = $_GET[idk]");
while($rmhs = mysqli_fetch_array($sqlmhs)){
?>
                                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$rmhs[nim_mhs]"; ?></td>
                                            <td><?php echo"$rmhs[nm_mhs]"; ?></td>
                                            <td><?php echo"$rmhs[jurusan]"; ?></td>
                                            <td><?php echo"$rmhs[status]"; ?></td>
                                            <td>
                                            </td>
                                        </tr>
<?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>