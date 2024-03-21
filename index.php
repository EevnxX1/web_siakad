<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    include"koneksi.php";
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sqluser = mysqli_query($con, "select * from tbl_user where username = '$user' AND password = '$pass' ");
    $row = mysqli_num_rows($sqluser);

    $sqldosen = mysqli_query($con, "select * from tbl_dosen where nidn_dosen = '$user' AND password = '$pass' ");
    $row1 = mysqli_num_rows($sqldosen);

    $sqlmhs = mysqli_query($con, "select * from tbl_mahasiswa where nim_mhs = '$user' AND password = '$pass' ");
    $row2 = mysqli_num_rows($sqlmhs);

    if($row > 0){
      $ruser = mysqli_fetch_array($sqluser);
      session_start();
      $_SESSION['namauser'] = $ruser['username'];
      $_SESSION['passuser'] = $ruser['password']; 

      echo"<script language = 'JavaScript'>
      confirm('Login Sebagai BAAK Berhasil !');
      document.location='baak';
      </script>"; 
    } else if($row1 > 0){
        $rdosen = mysqli_fetch_array($sqldosen);
        session_start();
        $_SESSION['nidndosen'] = $rdosen['nidn_dosen'];
        $_SESSION['passdosen'] = $rdosen['password']; 
  
        echo"<script language = 'JavaScript'>
        confirm('Login Sebagai Dosen Berhasil !');
        document.location='dosen';
        </script>"; 

    } else if($row2 > 0){
        $rmhs = mysqli_fetch_array($sqlmhs);
        session_start();
        $_SESSION['nimmhs'] = $rmhs['nim_mhs'];
        $_SESSION['passmhs'] = $rmhs['password']; 
  
        echo"<script language = 'JavaScript'>
        confirm('Login Sebagai Mahasiswa Berhasil !');
        document.location='mahasiswa';
        </script>"; 

    }else{
      echo"<script language = 'JavaScript'>
      confirm('Username & Password Salah !');
      document.location='';
      </script>";          
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISFO - LOGIN</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <!-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/logo.png" alt=""> -->
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>SISTEM INFORMASI AKADEMIK</b></h1>
                                    </div>

<form class="user" method="POST">
    <div class="form-group">
    <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Username...">
    </div>

 <div class="form-group">
 <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Password...">
 </div>

                                        <center><input type="submit" class="btn btn-primary btn-user btn-block" id="btn_login" value="Sig In" /></center>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>