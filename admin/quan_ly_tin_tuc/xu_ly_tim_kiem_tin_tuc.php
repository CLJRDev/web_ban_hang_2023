<?php
  session_start();
  include_once '../module/convert.php';
  $_SESSION['tu_khoa_tin_tuc'] = $_POST['tu_khoa'];
  if($_POST['tu_ngay'] != '')
    $_SESSION['tu_ngay_tin_tuc'] = format_date_db($_POST['tu_ngay']);
  else
    $_SESSION['tu_ngay_tin_tuc'] = $_POST['tu_ngay'];
  if($_POST['den_ngay'] != '')
    $_SESSION['den_ngay_tin_tuc'] = format_date_db($_POST['den_ngay']);
  else 
    $_SESSION['den_ngay_tin_tuc'] = $_POST['den_ngay'];
  $_SESSION['ma_loai_tin_tuc'] = $_POST['ma_loai_tin_tuc'];
  $_SESSION['trang_thai_tin_tuc'] = $_POST['trang_thai'];
  header('Location: quan_ly_tin_tuc.php', TRUE, 307);
?>