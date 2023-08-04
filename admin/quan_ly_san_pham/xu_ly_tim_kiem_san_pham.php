<?php
  session_start();
  $_SESSION['tu_khoa_san_pham'] = $_POST['tu_khoa'];
  $_SESSION['ma_nha_san_xuat'] = $_POST['ma_nha_san_xuat'];
  $_SESSION['ma_loai_san_pham'] = $_POST['ma_loai_san_pham'];
  $_SESSION['tu_gia'] = $_POST['tu_gia'];
  $_SESSION['den_gia'] = $_POST['den_gia'];
  $_SESSION['trang_thai_san_pham'] = $_POST['trang_thai'];
  header("location: quan_ly_san_pham.php", TRUE, 307);
?>