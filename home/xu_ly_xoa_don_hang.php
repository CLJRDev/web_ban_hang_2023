<?php
  include_once '../admin/module/database.php';
  include_once '../admin/module/javascript.php';
  execute_command("DELETE FROM gio_hang WHERE ma_gio_hang = :ma_gio_hang", array('ma_gio_hang' => $_GET['id']));
  location('/web_ban_hang/home/gio_hang.php');
?>
