<?php
  include '../module/database.php';
  include '../module/javascript.php';
  $ma_loai_tin_tuc = $_POST['ma_loai_tin_tuc'];
  $ten_loai_tin_tuc = $_POST['ten_loai_tin_tuc'];
  $trang_thai = isset($_POST['trang_thai']);
  $params = array();
  $params ['ma_loai_tin_tuc'] = $ma_loai_tin_tuc;
  $params['ten_loai_tin_tuc'] = $ten_loai_tin_tuc;
  $params['trang_thai'] = $trang_thai;
  $sql = "UPDATE loai_tin_tuc SET ten_loai_tin_tuc = :ten_loai_tin_tuc, trang_thai = :trang_thai WHERE ma_loai_tin_tuc = :ma_loai_tin_tuc";
  execute_command($sql, $params);  
  location('them_loai_tin_tuc.php');
?>