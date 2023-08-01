<?php
  session_start();
  include_once 'javascript.php';
  if(!isset($_SESSION['dang_nhap'])){
    location('../dang_nhap/dang_nhap.php');
  }
?>