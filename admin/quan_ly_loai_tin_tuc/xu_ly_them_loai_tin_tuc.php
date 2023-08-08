<?php
  include '../module/database.php';
  include '../module/javascript.php';
  $ten_loai_tin_tuc = $_POST['ten_loai_tin_tuc'];
  $trang_thai = isset($_POST['trang_thai']);
  $params = array();
  $params['ten_loai_tin_tuc'] = $ten_loai_tin_tuc;
  
  $data = execute_query("SELECT COUNT(*) AS dem FROM loai_tin_tuc WHERE ten_loai_tin_tuc = :ten_loai_tin_tuc", $params);
  if($data[0]['dem'] > 0){
    alert('Loại tin tức đã tồn tại');
		location('them_loai_tin_tuc.php');
		return;
  }

  $params['trang_thai'] = $trang_thai;
  $sql = "INSERT loai_tin_tuc(ten_loai_tin_tuc, trang_thai) VALUES(:ten_loai_tin_tuc, :trang_thai)";
  execute_command($sql, $params);
  location('them_loai_tin_tuc.php');
?>	