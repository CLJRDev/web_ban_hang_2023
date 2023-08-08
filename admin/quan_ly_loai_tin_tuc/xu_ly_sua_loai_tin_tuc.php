<?php
  include '../module/database.php';
  include '../module/javascript.php';
  $ma_loai_tin_tuc = $_POST['ma_loai_tin_tuc'];
  $ten_loai_tin_tuc = $_POST['ten_loai_tin_tuc'];
  $trang_thai = isset($_POST['trang_thai']);
  $params = array();
  $params ['ma_loai_tin_tuc'] = $ma_loai_tin_tuc;
  $params['ten_loai_tin_tuc'] = $ten_loai_tin_tuc;

  $data = execute_query("SELECT COUNT(*) AS dem FROM loai_tin_tuc WHERE ten_loai_tin_tuc = :ten_loai_tin_tuc AND ma_loai_tin_tuc <> :ma_loai_tin_tuc", $params);
  if($data[0]['dem'] > 0){
    alert('Loại tin tức đã tồn tại');
		location("sua_loai_tin_tuc.php?id={$ma_loai_tin_tuc}");
		return;
  }

  $params['trang_thai'] = $trang_thai;
  $sql = "UPDATE loai_tin_tuc SET ten_loai_tin_tuc = :ten_loai_tin_tuc, trang_thai = :trang_thai WHERE ma_loai_tin_tuc = :ma_loai_tin_tuc";
  execute_command($sql, $params);  
  location("sua_loai_tin_tuc.php?id={$ma_loai_tin_tuc}");
?>