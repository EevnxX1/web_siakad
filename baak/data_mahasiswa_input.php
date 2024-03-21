<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">DATA MAHASISWA</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="POST" enctype="multipart/form-data">
          
                    <div class="form-group">
                          <Label>NIM Mahasiswa :</Label>
                          <input type="text" class="form-control" name="nim_mhs" placeholder="Masukkan NIM Mahasiswa...">
                    </div>


                    <div class="form-group">
                          <Label>Nama Mahasiswa :</Label>
                          <input type="text" class="form-control" name="nm_mhs" placeholder="Masukkan Nama Mahasiswa...">
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
                          <Label>Status :</Label>
                          <select name="status" class="form-control" id="">
                            <option selected>~ Pilih Status Mahasiswa ~</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Tidak Aktif"></option>
                          </select>
                    </div>

                    <div class="form-group">
                          <Label>Foto Mahasiswa :</Label>
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

    if (in_array($ekstensi, $ekstensi_ok) === true) {
        if($ukuran <= 2000000) {
            move_uploaded_file($file_tmp, $folder);
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
 
    $query = mysqli_query($con,"insert into tbl_mahasiswa(nim_mhs, nm_mhs, password, tmp_lahir, tgl_lahir, gender, alamat, nohp, email, jurusan, status, foto) values ('$_POST[nim_mhs]','$_POST[nm_mhs]','$_POST[password]','$_POST[tmp_lahir]','$_POST[tgl_lahir]','$_POST[gender]','$_POST[alamat]','$_POST[nohp]','$_POST[email]','$_POST[jurusan]','$_POST[status]','$nm_foto')");

    echo "<script>
    alert('Data Berhasil Disimpan!');
    document.location='index.php?page=data_mahasiswa';
    </script>";
}
?>