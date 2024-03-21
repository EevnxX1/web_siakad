<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">DATA DOSEN</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="POST" enctype="multipart/form-data">
          
                    <div class="form-group">
                          <Label>NIDN Dosen :</Label>
                          <input type="text" class="form-control" name="nidn_dosen" placeholder="Masukkan NIDN Dosen...">
                    </div>


                    <div class="form-group">
                          <Label>Nama Dosen :</Label>
                          <input type="text" class="form-control" name="nm_dosen" placeholder="Masukkan Nama Dosen...">
                    </div>

                    <div class="form-group">
                          <Label>Password :</Label>
                          <input type="password" class="form-control" name="password" placeholder="************">
                      </div>

                     <div class="form-group">
                          <Label>Tempat Lahir</Label>
                          <input type="text" class="form-control" name="tmp_lahir" placeholder="Masukkan Tempat Lahir...">
                      </div>

                      <div class="form-group">
                          <Label>Tanggal Lahir :</Label>
                          <input type="date" class="form-control" name="tgl_lahir">
                      </div>

                    <div class="form-group">
                          <Label>Jenis Kelamin :</Label><br>
                          <input type="Radio" name="gender" value="Laki-Laki"> Laki-laki &nbsp&nbsp&nbsp&nbsp
                          <input type="Radio" name="gender" value="Perempuan"> Perempuan
                      </div>

                      <div class="form-group">
                          <Label>Alamat :</Label>
                          <textarea name="alamat" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                          <Label>Nomor Handphone :</Label>
                          <input type="text" class="form-control" name="nohp" placeholder="+62...">
                    </div>

                    <div class="form-group">
                          <Label>Email :</Label>
                          <input type="email" class="form-control" name="email" placeholder="...@...">
                    </div>

                    <div class="form-group">
                          <Label>Jurusan :</Label>
                          <select name="jurusan" class="form-control" id="">
                            <option selected>~ Pilih Jurusan ~</option>
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
                            <option selected>~ Pilih Mata Kuliah ~</option>
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
                            <option selected>~ Pilih Status Dosen ~</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                          </select>
                    </div>

                    <div class="form-group">
                          <Label>Foto Dosen :</Label>
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
    $folder = "../assets/foto_dosen/$nm_foto";

    if (in_array($ekstensi, $ekstensi_ok) === true) {
        if($ukuran <= 2000000) {
            move_uploaded_file($file_tmp, $folder);
        } else {
            echo"<script>
            alert('File Yang Di Upload Melebihi Kapasitas!');
            document.location.href='index.php?page=data_dosen_input';      
            </script>";
        }
    } else {
      echo"<script>
      alert('File Yang Anda Upload Bukan Gambar!');
      document.location.href='index.php?page=data_dosen_input';      
      </script>";
    }
 
    $query = mysqli_query($con,"insert into tbl_dosen(nidn_dosen, nm_dosen, password, tmp_lahir, tgl_lahir, gender, alamat, nohp, email, jurusan, matkul, status, foto) values ('$_POST[nidn_dosen]','$_POST[nm_dosen]','$_POST[password]','$_POST[tmp_lahir]','$_POST[tgl_lahir]','$_POST[gender]','$_POST[alamat]','$_POST[nohp]','$_POST[email]','$_POST[jurusan]', '$_POST[matkul]', '$_POST[status]','$nm_foto')");

    echo "<script>
    alert('Data Berhasil Disimpan!');
    document.location='index.php?page=data_dosen';
    </script>";
}
?>