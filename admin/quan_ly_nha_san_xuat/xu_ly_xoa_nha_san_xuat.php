<?php
	include '../module/database.php';	
  include '../module/javascript.php';
  $param = array('ma_nha_san_xuat' => $_GET['id']);

  //Kiem tra rang buoc
  $data = execute_query("SELECT COUNT(*) AS dem FROM san_pham WHERE ma_nha_san_xuat = :ma_nha_san_xuat", $param);
  if($data[0]['dem'] > 0){
    alert('Còn sản phẩm thuộc nhà sản xuất này');
    location('them_nha_san_xuat.php');
    return;
  }
	$hinh_anh = execute_query("SELECT hinh_anh FROM nha_san_xuat WHERE ma_nha_san_xuat = :ma_nha_san_xuat", $param);
	if (count($hinh_anh) > 0) { 
		execute_command("DELETE FROM nha_san_xuat WHERE ma_nha_san_xuat = :ma_nha_san_xuat", $param);
		unlink('../../data/nha_san_xuat/'.$hinh_anh[0][0]);
	}
	header('location: them_nha_san_xuat.php', TRUE, 307);
?>