<?php
  include_once '../admin/module/database.php';
  include_once '../admin/module/javascript.php';
  $ma_san_pham = $_GET['id'];
  execute_command("INSERT gio_hang(ma_san_pham) VALUES (:ma_san_pham)", array('ma_san_pham' => $ma_san_pham));
  location("/web_ban_hang/home/trinh_bay_san_pham.php?id={$ma_san_pham}");
?>
