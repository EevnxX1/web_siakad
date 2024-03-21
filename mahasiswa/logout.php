<?php
session_start();
$_SESSION['namauser'] = '';
unset($_SESSION['namauser']);
session_unset();
session_destroy();
 echo"<script language = 'JavaScript'>
      alert('Anda Berhasil keluar !');
      document.location='../index.php';
      </script>";   
?>