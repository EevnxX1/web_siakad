 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
<form action="multi_delete.php" method="post">
<a href="index.php?page=data_mahasiswa_input" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
<button type="submit" name="btn_delete" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini..?')"><i class="fa fa-trash"></i> Hapus Data</button><p></p>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No.</th>
                                            <th>Foto Mahasiswa</th>
                                            <th>NIM Mahasiswa</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>TTL</th>
                                            <th>Gender</th>
                                            <th>Jurusan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>No.</th>
                                            <th>Foto Mahasiswa</th>
                                            <th>NIM Mahasiswa</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>TTL</th>
                                            <th>Gender</th>
                                            <th>Jurusan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
include"../koneksi.php";
$no=1;
$sqlmhs = mysqli_query($con,"Select * from tbl_mahasiswa");
while($rmhs = mysqli_fetch_array($sqlmhs)){
?>
                                        <tr>
                                            <td><input type="checkbox" name="id[]" value="<?= "$rmhs[id_mhs]" ?>"></td>
                                            <td><?php echo"$no"; ?></td>
                                            <td><img src="<?= "../assets/foto_mahasiswa/$rmhs[foto]" ?>" width="150px" height="150px"></td>
                                            <td><?php echo"$rmhs[nim_mhs]"; ?></td>
                                            <td><?php echo"$rmhs[nm_mhs]"; ?></td>
                                            <td><?php echo"$rmhs[tmp_lahir], $rmhs[tgl_lahir]"; ?></td>
                                            <td><?php echo"$rmhs[gender]"; ?></td>
                                            <td><?php echo"$rmhs[jurusan]"; ?></td>
                                            <td><?php echo"$rmhs[status]"; ?></td>
                                            <td>
                                                <a class="btn btn-warning" href="<?= "index.php?page=data_mahasiswa_update&idm=$rmhs[id_mhs]" ?>">Edit</a>
                                                <a class="btn btn-danger" href="<?= "index.php?page=data_mahasiswa_hapus&idm=$rmhs[id_mhs]" ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini..?')">Hapus</a>
                                            </td>
                                        </tr>
<?php $no++; } ?>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>

<script>
    $(function() {
        $('.check_all').click(function(){
            $('.chk_boxes1').prop('checked', this.checked);
        });
    });
</script>