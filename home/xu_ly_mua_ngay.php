<?php
  include '../admin/module/database.php';
  include '../admin/module/javascript.php';
  $ma_san_pham = $_GET['id'];
  execute_command("INSERT gio_hang(ma_san_pham) VALUES (:ma_san_pham)", array('ma_san_pham' => $ma_san_pham));
  location("/web_ban_hang/home/gio_hang.php");
?>