<?php
  include '../module/database.php';
  $ma_san_pham = $_GET['id'];  

  $sql = "SELECT hinh_anh FROM san_pham WHERE ma_san_pham = :ma_san_pham";
  $params = array('ma_san_pham' => $ma_san_pham);
  $hinh_anh = execute_query($sql, $params);
  if(count($hinh_anh) > 0){
    unlink('../../data/san_pham/' . $hinh_anh[0][0]);
    execute_command("DELETE FROM san_pham WHERE ma_san_pham = :ma_san_pham", $params);  
  }
  header("Location: quan_ly_san_pham.php", TRUE, 307);
?>