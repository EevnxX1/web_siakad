<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

              <a href="" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Data</a>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nim Mahasiswa</th>
                      <th>Nama Mahasiswa</th>
                      <th>TTL</th>
                      <th>Gender</th>
                      <th>Jurusan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Nim Mahasiswa</th>
                      <th>Nama Mahasiswa</th>
                      <th>TTL</th>
                      <th>Gender</th>
                      <th>Jurusan</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    include "../koneksi.php";
                    $no = 1;
                    $sql_mhs = mysqli_query($con, "SELECT * FROM tbl_mahasiswa");
                    while ($rmhs = mysqli_fetch_array($sql_mhs)) {
                    ?>
                    <tr>
                      <td><?="$no";?></td>
                      <td><?= "$rmhs=[nim_mhs]"; ?></td>
                      <td><?= "$rmhs=[nm_mhs]"; ?></td>
                      <td><?= "$rmhs=[tmp_lahir], $rmhs=[tgl_lahir]"; ?></td>
                      <td><?= "$rmhs=[gender]"; ?></td>
                      <td><?= "$rmhs=[jurusan]"; ?></td>
                      <td><?= "$rmhs=[status]"; ?></td>
                    </tr>
                    <?php $no++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>