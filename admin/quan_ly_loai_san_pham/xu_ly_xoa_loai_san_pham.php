<?php
  include '../module/database.php';
  include '../module/javascript.php';
  $ma_loai_san_pham = $_GET['id'];
  //Kiem tra rang buoc
  $sql = "SELECT COUNT(*) AS dem FROM san_pham WHERE ma_loai_san_pham = :ma_loai_san_pham";
  $params = array('ma_loai_san_pham' => $ma_loai_san_pham);
  $data = execute_query($sql, $params);
  if($data[0]['dem'] > 0){
    alert('Còn tồn tại sản phẩm thuộc loại sản phẩm này');
    location('/web_ban_hang/admin/quan_ly_loai_san_pham/them_loai_san_pham.php');
    return;
  }
  $sql = "SELECT hinh_anh FROM loai_san_pham WHERE ma_loai_san_pham=:ma_loai_san_pham";
  $hinh_anh = execute_query($sql,$params);
  if(count($hinh_anh) > 0){
    execute_command("DELETE FROM loai_san_pham WHERE ma_loai_san_pham = :ma_loai_san_pham", $params);
    unlink('../../data/loai_san_pham/'.$hinh_anh[0][0]);
  }
  header("Location: them_loai_san_pham.php", TRUE, 307);
?>