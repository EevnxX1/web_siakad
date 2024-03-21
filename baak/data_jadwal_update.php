<?php
include "../koneksi.php";
$sql = mysqli_query($con, "SELECT * FROM tbl_jadwal 
                        INNER JOIN tbl_kelas ON tbl_jadwal.id_kelas = tbl_kelas.id_kelas 
                        INNER JOIN  tbl_matkul ON tbl_jadwal.id_matkul = tbl_matkul.id_matkul 
                        INNER JOIN tbl_dosen ON tbl_jadwal.id_dosen = tbl_dosen.id_dosen 
                        WHERE tbl_jadwal.id_jadwal = '$_GET[idj]'");
$data = $sql -> fetch_array();
?>
<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">INPUT DATA JADWAL PERKULIAHAN</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="POST">
          
                    <div class="form-group">
                          <Label>Nama Kelas :</Label>
                          <select name="id_kelas" class="form-control" class="form-control">
                            <option value="<?= "$data[id_kelas]" ?>"><?= "$data[nm_kelas]" ?></option>
                            <?php
                            include "../koneksi.php";
                            $sqlkls = mysqli_query($con, "SELECT * FROM tbl_kelas");
                            while($rkls = $sqlkls->fetch_array()) {
                            ?>
                            <option value="<?= "$rkls[id_kelas]" ?>"><?= "$rkls[nm_kelas]" ?></option>
                            <?php
                            }
                            ?>
                          </select>
                    </div>

                    <div class="form-group">
                          <Label>Nama MataKuliah :</Label>
                          <select name="id_matkul" class="form-control" class="form-control">
                            <option value="<?= "$data[id_matkul]" ?>"><?= "$data[nm_matkul]" ?></option>

                            <?php
                            include "../koneksi.php";
                            $sqlmatkul = mysqli_query($con, "SELECT * FROM tbl_matkul");
                            while($rmatkul = $sqlmatkul->fetch_array()) {
                            ?>
                            <option value="<?= "$rmatkul[id_matkul]" ?>"><?= "$rmatkul[nm_matkul]" ?></option>
                            <?php
                            }
                            ?>
                          </select>
                    </div>

                    <div class="form-group">
                          <Label>Nama Dosen :</Label>
                          <select name="id_dosen" class="form-control" class="form-control">
                            <option value="<?= "$data[id_dosen]" ?>"><?= "$data[nm_dosen]" ?></option>

                            <?php
                            include "../koneksi.php";
                            $sqldosen = mysqli_query($con, "SELECT * FROM tbl_dosen");
                            while($rdosen = $sqldosen->fetch_array()) {
                            ?>
                            <option value="<?= "$rdosen[id_dosen]" ?>"><?= "$rdosen[nm_dosen]" ?></option>
                            <?php
                            }
                            ?>
                          </select>
                    </div>

                    <div class="form-group">
                      <label>Hari :</label>
                      <input type="text" name="hari" class="form-control" value="<?= "$data[hari]" ?>">
                    </div>

                    <div class="form-group">
                      <label>Jam :</label>
                      <input type="text" name="jam" class="form-control" value="<?= "$data[jam]" ?>">
                    </div>
                    
                    <div class="form-group">
                      <label>Ruangan :</label>
                      <input type="text" name="ruangan" class="form-control" value="<?= "$data[ruangan]" ?>">
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
 
    $query = mysqli_query($con, "UPDATE tbl_jadwal SET 
                                id_kelas = '$_POST[id_kelas]',
                                id_matkul = '$_POST[id_matkul]',
                                id_dosen = '$_POST[id_dosen]',
                                ruangan = '$_POST[ruangan]',
                                hari = '$_POST[hari]',
                                jam = '$_POST[jam]' WHERE 
                                id_jadwal = '$_GET[idj]'
                                ");

    echo "<script>
    alert('Data Berhasil Diubah!');
    document.location='index.php?page=data_jadwal';
    </script>";
}
?>