<?php
require "../koneksi.php";
$sql = mysqli_query($con, "SELECT * FROM tbl_dosen WHERE id_dosen = '$_GET[ids]'");
$dsn = mysqli_fetch_array($sql);
?>
<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">UPDATE DATA DOSEN</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="POST" enctype="multipart/form-data">
          
                    <div class="form-group">
                          <Label>NIDN Dosen :</Label>
                          <input type="hidden" name="id_dosen" value="<?= "$dsn[id_dosen]" ?>">
                          <input type="text" class="form-control" name="nidn_dosen" value="<?= "$dsn[nidn_dosen]" ?>">
                    </div>


                    <div class="form-group">
                          <Label>Nama Dosen :</Label>
                          <input type="text" class="form-control" name="nm_dosen" value="<?= "$dsn[nm_dosen]" ?>">
                    </div>

                    <div class="form-group">
                          <Label>Password :</Label>
                          <input type="password" class="form-control" name="password" value="<?= "$dsn[password]" ?>">
                      </div>

                     <div class="form-group">
                          <Label>Tempat Lahir</Label>
                          <input type="text" class="form-control" name="tmp_lahir" value="<?= "$dsn[tmp_lahir]" ?>">
                      </div>

                      <div class="form-group">
                          <Label>Tanggal Lahir :</Label>
                          <input type="date" class="form-control" name="tgl_lahir" value="<?= "$dsn[tgl_lahir]" ?>">
                      </div>

                    <div class="form-group">
                          <Label>Jenis Kelamin :</Label><br>
                          <input type="Radio" name="gender" value="Laki-laki" <?php if($dsn['gender'] == "Laki-laki") echo"checked='checked'"; ?>> Laki-laki &nbsp&nbsp&nbsp&nbsp
                          <input type="Radio" name="gender" value="Perempuan"<?php if($dsn['gender'] == "Perempuan") echo"checked='checked'"; ?>> Perempuan
                      </div>

                      <div class="form-group">
                          <Label>Alamat :</Label>
                          <textarea name="alamat" class="form-control"><?= "$dsn[alamat]" ?></textarea>
                    </div>

                    <div class="form-group">
                          <Label>Nomor Handphone :</Label>
                          <input type="text" class="form-control" name="nohp" value="<?= "$dsn[nohp]" ?>">
                    </div>

                    <div class="form-group">
                          <Label>Email :</Label>
                          <input type="email" class="form-control" name="email" value="<?= "$dsn[email]" ?>">
                    </div>

                    <div class="form-group">
                          <Label>Jurusan :</Label>
                          <select name="jurusan" class="form-control" id="">
                            <option value="<?= "$dsn[jurusan]" ?>"><?= "$dsn[jurusan]" ?></option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                            <option value="Komputerisasi Akutansi">Komputerisasi Akutansi</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akutansi">Akutansi</option>
                          </select>
                    </div>

                    <div class="form-group">
                          <Label>Mata Kuliah :</Label>
                          <select name="matkul" class="form-control" id="">
                            <option value="<?= "$dsn[matkul]" ?>"><?= "$dsn[matkul]" ?></option>
                            <option value="Sistem Operasi">Sistem Operasi</option>
                            <option value="Sistem Basis Data">Sistem Basis Data</option>
                            <option value="Struktur Data">Struktur Data</option>
                            <option value="Rekayasa Aplikasi Internet">Rekayasa Aplikasi Internet</option>
                            <option value="Komunikasi Data Dan Jaringan">Komunikasi Data Dan Jaringan</option>
                            <option value="Teknik Multimedia Digital">Teknik Multimedia Digital</option>
                          </select>
                    </div>

                    <div class="form-group">
                          <Label>Status :</Label>
                          <select name="status" class="form-control" id="">
                            <option value="<?= "$dsn[status]" ?>"><?= "$dsn[status]" ?></option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                          </select>
                    </div>

                    <div class="form-group">
                          <Label>Foto Dosen :</Label>
                          <img src="<?= "../assets/foto_dosen/$dsn[foto]"; ?>" width="200">
                          <input type="file" class="form-control" name="foto">
                    </div>

                    <div class="form-group">
                          <input type="submit" class="btn btn-primary" name="submit" value="Ubah Data">
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
    $folder = "../assets/foto_dosen/$nm_foto";

    if(!$file_tmp == "") {

    if (in_array($ekstensi, $ekstensi_ok) === true) {
        if($ukuran <= 2000000) {
            move_uploaded_file($file_tmp, $folder);
            $dsn_sql = mysqli_query($con, "SELECT foto FROM tbl_dosen WHERE id_dosen = '$_GET[ids]'");
            $ft = mysqli_fetch_array($dsn_sql);
            unlink("../assets/foto_dosen/".$ft['foto']);
        
    $query = mysqli_query($con, "UPDATE tbl_dosen SET 
                            nidn_dosen = '$_POST[nidn_dosen]',
                            nm_dosen = '$_POST[nm_dosen]',
                            password = '$_POST[password]',
                            tmp_lahir = '$_POST[tmp_lahir]',
                            tgl_lahir = '$_POST[tgl_lahir]',
                            gender = '$_POST[gender]',
                            alamat = '$_POST[alamat]',
                            nohp = '$_POST[nohp]',
                            email = '$_POST[email]',
                            jurusan = '$_POST[jurusan]',
                            matkul = '$_POST[matkul]',
                            status = '$_POST[status]',
                            foto = '$nm_foto' WHERE
                            id_dosen = '$_GET[ids]'
                            ");

    echo "<script>
    alert('Data Berhasil Diubah!');
    document.location='index.php?page=data_dosen';
    </script>";

} else {
    echo"<script>
    alert('File Yang Di Upload Melebihi Kapasitas!');
    document.location.href='index.php?page=data_dosen_update';      
    </script>";
}

} else {
    echo"<script>
    alert('File Yang Anda Upload Bukan Gambar!');
    document.location.href='index.php?page=data_dosen_update';      
    </script>";
  }

} else {
    $query = mysqli_query($con, "UPDATE tbl_dosen SET 
                            nidn_dosen = '$_POST[nidn_dosen]',
                            nm_dosen = '$_POST[nm_dosen]',
                            password = '$_POST[password]',
                            tmp_lahir = '$_POST[tmp_lahir]',
                            tgl_lahir = '$_POST[tgl_lahir]',
                            gender = '$_POST[gender]',
                            alamat = '$_POST[alamat]',
                            nohp = '$_POST[nohp]',
                            email = '$_POST[email]',
                            jurusan = '$_POST[jurusan]',
                            matkul = '$_POST[matkul]',
                            status = '$_POST[status]' WHERE
                            id_dosen = '$_GET[ids]'
                            ");

    echo "<script>
    alert('Data Berhasil Diubah!');
    document.location='index.php?page=data_dosen';
    </script>";
}

}
?>