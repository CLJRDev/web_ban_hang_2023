<?php
	include '../module/database.php';
	include '../module/javascript.php';
	$ma_tin_tuc = $_GET['id'];
	$params = array('ma_tin_tuc'=> $ma_tin_tuc);
	$sql = "SELECT hinh_anh FROM tin_tuc WHERE ma_tin_tuc=:ma_tin_tuc";
	$hinh_anh = execute_query($sql,$params);
	if(count($hinh_anh) > 0){
		execute_command("DELETE FROM tin_tuc WHERE ma_tin_tuc = :ma_tin_tuc",$params);
		unlink('../../data/tin_tuc/'.$hinh_anh[0][0]);
	}
	location ('quan_ly_tin_tuc.php');
?>