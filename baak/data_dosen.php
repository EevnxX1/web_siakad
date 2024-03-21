 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                
                            <a href="index.php?page=data_dosen_input" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a><p></p>
                            
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nim Dosen</th>
                                            <th>Nama Dosen</th>
                                            <th>TTL</th>
                                            <th>Gender</th>
                                            <th>alamat</th>
                                            <th>Jurusan</th>
                                            <th>Mata Kuliah</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nim Dosen</th>
                                            <th>Nama Dosen</th>
                                            <th>TTL</th>
                                            <th>Gender</th>
                                            <th>Alamat</th>
                                            <th>Jurusan</th>
                                            <th>Mata Kuliah</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
include"../koneksi.php";
$no=1;
$sqldsn = mysqli_query($con,"Select * from tbl_dosen");
while($rdsn = mysqli_fetch_array($sqldsn)){
?>
                                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$rdsn[nidn_dosen]"; ?></td>
                                            <td><?php echo"$rdsn[nm_dosen]"; ?></td>
                                            <td><?php echo"$rdsn[tmp_lahir], $rdsn[tgl_lahir]"; ?></td>
                                            <td><?php echo"$rdsn[gender]"; ?></td>
                                            <td><?php echo"$rdsn[alamat]"; ?></td>
                                            <td><?php echo"$rdsn[jurusan]"; ?></td>
                                            <td><?php echo"$rdsn[matkul]"; ?></td>
                                            <td><?php echo"$rdsn[status]"; ?></td>
                                            <td><a href="<?= "index.php?page=data_dosen_update&ids=$rdsn[id_dosen]"; ?>" class="btn btn-warning">Edit</a>
                                                <a href="<?= "index.php?page=data_dosen_delete&ids=$rdsn[id_dosen]" ?>" class="btn btn-danger" onclick="return confirm('Apakah anda Yakin Ingin Hapus Data Dosen Ini?')">Hapus</a>
                                            </td>
                                        </tr>
<?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>