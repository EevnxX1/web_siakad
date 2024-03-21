<?php
include "../koneksi.php";
$sql = mysqli_query($con, "SELECT * FROM tbl_kelas INNER JOIN tbl_jurusan ON tbl_kelas.id_jurusan = tbl_jurusan.id_jurusan WHERE tbl_kelas.id_kelas = '$_GET[idk]'");
$data = $sql -> fetch_array();
?>
<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">DATA MAHASISWA</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="POST">
          
                    <div class="form-group">
                          <Label>Kode Kelas :</Label>
                          <input type="text" class="form-control" name="kd_kelas" value="<?= "$data[kd_kelas]" ?>">
                    </div>


                    <div class="form-group">
                          <Label>Nama Kelas :</Label>
                          <input type="text" class="form-control" name="nm_kelas" value="<?= "$data[nm_kelas]" ?>">
                    </div>

                    <div class="form-group">
                          <Label>Semester :</Label>
                          <select name="semester" class="form-control">
                            <option value="<?= "$data[semester]" ?>"><?= "$data[semester]" ?></option>
                            <option value="Semester 1">Semester 1</option>
                            <option value="Semester 2">Semester 2</option>
                            <option value="Semester 3">Semester 3</option>
                            <option value="Semester 4">Semester 4</option>
                            <option value="Semester 5">Semester 5</option>
                            <option value="Semester 6">Semester 6</option>
                            <option value="Semester 7">Semester 7</option>
                            <option value="Semester 8">Semester 8</option>
                          </select>
                      </div>

                    <div class="form-group">
                          <Label>Jurusan :</Label>
                          <select name="id_jurusan" class="form-control" class="form-control">
                          <option value="<?= "$data[id_jurusan]" ?>"><?= "$data[nm_jurusan]" ?></option>
                            <?php
                            $sqljur = mysqli_query($con, "SELECT * FROM tbl_jurusan");
                            while($rjur = $sqljur->fetch_array()) {
                            ?>
                            <option value="<?= "$rjur[id_jurusan]" ?>"><?= "$rjur[nm_jurusan]" ?></option>
                            <?php
                            }
                            ?>
                          </select>
                    </div>

                    <div class="form-group">
                          <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
                    </div>
                    
                    
                  </form>
                  <div>
              </div>
            </div>
          </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "../koneksi.php";
 
    $query = mysqli_query($con, "UPDATE tbl_kelas SET
                          kd_kelas = '$_POST[kd_kelas]',
                          nm_kelas = '$_POST[nm_kelas]',
                          semester = '$_POST[semester]',
                          id_jurusan = '$_POST[id_jurusan]' WHERE 
                          id_kelas = '$_GET[idk]'
                          ");

    echo "<script>
    alert('Data Berhasil Disimpan!');
    document.location='index.php?page=data_kelas';
    </script>";
}
?>