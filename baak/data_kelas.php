<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

              <a href="index.php?page=data_kelas_input" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Data</a>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kode Kelas</th>
                      <th>Nama kelas</th>
                      <th>Semester</th>
                      <th>Kode Jurusan</th>
                      <th>Nama Jurusan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Kode Kelas</th>
                      <th>Nama kelas</th>
                      <th>Semester</th>
                      <th>Kode Jurusan</th>
                      <th>Nama Jurusan</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    include "../koneksi.php";
                    $no = 1;
                    $sql_kls = mysqli_query($con, "SELECT * FROM tbl_kelas INNER JOIN tbl_jurusan ON tbl_kelas.id_jurusan = tbl_jurusan.id_jurusan");
                    while ($rkls = mysqli_fetch_array($sql_kls)) {
                    ?>
                    <tr>
                      <td><?="$no";?></td>
                      <td><?= "$rkls[kd_kelas]"; ?></td>
                      <td><?= "$rkls[nm_kelas]"; ?></td>
                      <td><?= "$rkls[semester]"; ?></td>
                      <td><?= "$rkls[kd_jurusan]"; ?></td>
                      <td><?= "$rkls[nm_jurusan]"; ?></td>
                      <td>
                        <a class="btn btn-warning" href="<?= "index.php?page=data_kelas_update&idk=$rkls[id_kelas]" ?>">Edit</a>
                        <a class="btn btn-danger" href="<?= "index.php?page=data_kelas_hapus&idk=$rkls[id_kelas]" ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini..?')">Hapus</a>
                        <a class="btn btn-success" href="<?= "index.php?page=data_kelas_mhs&idk=$rkls[id_kelas]" ?>">Add MHS</a>
                        <a class="btn btn-primary" href="<?= "index.php?page=data_kelas_view&idk=$rkls[id_kelas]" ?>">View MHS</a>
                    </td>
                    </tr>
                    <?php $no++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>