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
                            <option selected>~ Pilih Nama Kelas ~</option>
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
                            <option selected>~ Pilih Matakuliah ~</option>

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
                            <option selected>~ Pilih Nama Dosen ~</option>

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
                      <input type="text" name="hari" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Jam :</label>
                      <input type="text" name="jam" class="form-control">
                    </div>
                    
                    <div class="form-group">
                      <label>Ruangan :</label>
                      <input type="text" name="ruangan" class="form-control">
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
 
    $query = mysqli_query($con,"insert into tbl_jadwal(id_kelas, id_matkul, id_dosen, ruangan, hari, jam) values ('$_POST[id_kelas]','$_POST[id_matkul]','$_POST[id_dosen]','$_POST[ruangan]', '$_POST[hari]', '$_POST[jam]')");

    echo "<script>
    alert('Data Berhasil Disimpan!');
    document.location='index.php?page=data_jadwal';
    </script>";
}
?>