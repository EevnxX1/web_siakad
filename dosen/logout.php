<?php
session_start();
$_SESSION['nidndosen'] = '';
unset($_SESSION['nidndosen']);
session_unset();
session_destroy();
 echo"<script language = 'JavaScript'>
      alert('Anda Berhasil keluar !');
      document.location='../index.php';
      </script>";   
?>