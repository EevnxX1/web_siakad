<?php
include "../koneksi.php";
$sqlm = mysqli_query($con, "SELECT * FROM tbl_mahasiswa WHERE id_mhs = '$_GET[idm]'");
$rm = mysqli_fetch_array($sqlm);
?>

<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">UPDATE DATA MAHASISWA</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="POST" enctype="multipart/form-data">
          
                    <div class="form-group">
                          <Label>NIM Mahasiswa :</Label>
                          <input type="text" class="form-control" name="nim_mhs" value="<?= "$rm[nim_mhs]" ?>">
                    </div>


                    <div class="form-group">
                          <Label>Nama Mahasiswa :</Label>
                          <input type="text" class="form-control" name="nm_mhs" value="<?= "$rm[nm_mhs]" ?>">
                    </div>

                    <div class="form-group">
                          <Label>Password :</Label>
                          <input type="password" class="form-control" name="password" value="<?= "$rm[nim_mhs]" ?>">
                      </div>

                     <div class="form-group">
                          <Label>Tempat Lahir</Label>
                          <input type="text" class="form-control" name="tmp_lahir" value="<?= "$rm[tmp_lahir]" ?>">
                      </div>

                      <div class="form-group">
                          <Label>Tanggal Lahir :</Label>
                          <input type="date" class="form-control" name="tgl_lahir" value="<?= "$rm[tgl_lahir]" ?>">
                      </div>

                    <div class="form-group">
                          <Label>Jenis Kelamin :</Label><br>
                          <input type="Radio" name="gender" value="Laki-Laki" <?php if($rm['gender'] == "Pria") echo"checked='checked'"; ?>> Pria &nbsp&nbsp&nbsp&nbsp
                          <input type="Radio" name="gender" value="Perempuan" <?php if($rm['gender'] == "Wanita") echo"checked='checked'"; ?>> Wanita
                      </div>

                      <div class="form-group">
                          <Label>Alamat :</Label>
                          <textarea name="alamat" class="form-control"><?= "$rm[alamat]" ?></textarea>
                    </div>

                    <div class="form-group">
                          <Label>Nomor Handphone :</Label>
                          <input type="text" class="form-control" name="nohp" value="<?= "$rm[nohp]" ?>">
                    </div>

                    <div class="form-group">
                          <Label>Email :</Label>
                          <input type="email" class="form-control" name="email" value="<?= "$rm[email]" ?>">
                    </div>

                    <div class="form-group">
                          <Label>Jurusan :</Label>
                          <select name="jurusan" class="form-control" id="">
                            <option value="<?= "$rm[jurusan]" ?>"><?= "$rm[jurusan]" ?></option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                            <option value="Komputerisasi Akutansi">Komputerisasi Akutansi</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akutansi">Akutansi</option>
                          </select>
                    </div>

                    <div class="form-group">
                          <Label>Status :</Label>
                          <select name="status" class="form-control" id="">
                            <option value="<?= "$rm[status]" ?>"><?= "$rm[status]" ?></option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Tidak Aktif"></option>
                          </select>
                    </div>

                    <div class="form-group">
                          <Label>Foto Mahasiswa  :
                              <?=
                              "<img src='../assets/foto_mahasiswa/$rm[foto]' width='200' height='200'>"
                              ?>
                          </Label>
                          <input type="file" class="form-control" name="foto">
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

    $ekstensi_ok = array('jpg', 'png', 'jpeg', 'gif');
    $foto = $_FILES['foto']['name'];
    $x = explode(".", $foto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    $angka_acak = rand(1, 9999);
    $nm_foto = $angka_acak. "-" .$foto;
    $folder = "../assets/foto_mahasiswa/$nm_foto";

    if(!$file_tmp == "") {
    if (in_array($ekstensi, $ekstensi_ok) === true) {
        if($ukuran <= 2000000) {
            move_uploaded_file($file_tmp, $folder);
            
            $query = mysqli_query($con, "SELECT * FROM tbl_mahasiswa WHERE id_mhs = '$_GET[idm]'");
            $data_file = $query->fetch_array();
            unlink('../assets/foto_mahasiswa/'.$data_file['foto']);
    
 
    $query = mysqli_query($con,"UPDATE tbl_mahasiswa SET 
                              nim_mhs = '$_POST[nim_mhs]', 
                              nm_mhs = '$_POST[nm_mhs]', 
                              password = '$_POST[password]', 
                              tmp_lahir = '$_POST[tmp_lahir]', 
                              tgl_lahir = '$_POST[tgl_lahir]', 
                              gender = '$_POST[gender]', 
                              alamat = '$_POST[alamat]', 
                              nohp = '$_POST[nohp]', 
                              email = '$_POST[email]', 
                              jurusan = '$_POST[jurusan]', 
                              status = '$_POST[status]', 
                              foto = '$nm_foto' WHERE
                              id_mhs = '$_GET[idm]'
                              ");

    echo "<script>
    alert('Data Berhasil Diupdate!');
    document.location='index.php?page=data_mahasiswa';
    </script>";

} else {
      echo"<script>
      alert('File Yang Di Upload Melebihi Kapasitas!');
      document.location.href='index.php?page=data_mahasiswa_input';      
      </script>";
  }

} else {
      echo"<script>
      alert('File Yang Anda Upload Bukan Gambar!');
      document.location.href='index.php?page=data_mahasiswa_input';      
      </script>";
    }
} else {
      $query = mysqli_query($con,"UPDATE tbl_mahasiswa SET 
                              nim_mhs = '$_POST[nim_mhs]', 
                              nm_mhs = '$_POST[nm_mhs]', 
                              password = '$_POST[password]', 
                              tmp_lahir = '$_POST[tmp_lahir]', 
                              tgl_lahir = '$_POST[tgl_lahir]', 
                              gender = '$_POST[gender]', 
                              alamat = '$_POST[alamat]', 
                              nohp = '$_POST[nohp]', 
                              email = '$_POST[email]', 
                              jurusan = '$_POST[jurusan]', 
                              status = '$_POST[status]' WHERE
                              id_mhs = '$_GET[idm]'
                              ");

    echo "<script>
    alert('Data Berhasil Diupdate!');
    document.location='index.php?page=data_mahasiswa';
    </script>";
}
}
?>