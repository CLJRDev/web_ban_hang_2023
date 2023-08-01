<?php
  include '../module/database.php';
  include '../module/javascript.php';
  $ten_loai_tin_tuc = $_POST['ten_loai_tin_tuc'];
  $trang_thai = isset($_POST['trang_thai']);
  $params = array();
  $params['ten_loai_tin_tuc'] = $ten_loai_tin_tuc;
  $params['trang_thai'] = $trang_thai;
  $sql = "INSERT loai_tin_tuc(ten_loai_tin_tuc, trang_thai) VALUES(:ten_loai_tin_tuc, :trang_thai)";
  execute_command($sql, $params);
  location('them_loai_tin_tuc.php');
?>	