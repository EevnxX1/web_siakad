<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">DATA KELAS INPUT</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="POST">
          
                    <div class="form-group">
                          <Label>Kode Kelas :</Label>
                          <input type="text" class="form-control" name="kd_kelas" placeholder="Masukkan Kode Kelas...">
                    </div>


                    <div class="form-group">
                          <Label>Nama Kelas :</Label>
                          <input type="text" class="form-control" name="nm_kelas" placeholder="Masukkan Nama Kelas...">
                    </div>

                    <div class="form-group">
                          <Label>Semester :</Label>
                          <select name="semester" class="form-control">
                            <option selected>~ Pilih Semester ~</option>
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
                            <option selected>~ Pilih Jurusan ~</option>

                            <?php
                            include "../koneksi.php";
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
 
    $query = mysqli_query($con,"insert into tbl_kelas(kd_kelas, nm_kelas, semester, id_jurusan) values ('$_POST[kd_kelas]','$_POST[nm_kelas]','$_POST[semester]','$_POST[id_jurusan]')");

    echo "<script>
    alert('Data Berhasil Disimpan!');
    document.location='index.php?page=data_kelas';
    </script>";
}
?>