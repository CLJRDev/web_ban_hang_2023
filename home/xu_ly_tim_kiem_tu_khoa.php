<?php
  start_session();
  include_once '../admin/module/javascript.php';
  $_SESSION['tu_khoa'] = $_POST['tu_khoa'];
  location("/web_ban_hang/home/gioi_thieu_tat_ca_san_pham.php");
?>