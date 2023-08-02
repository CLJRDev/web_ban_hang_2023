<?php
	include '../module/database.php';
	$ten_nha_san_xuat = $_POST['ten_nha_san_xuat'];
	$trang_thai = isset($_POST['trang_thai']);
	$filename = $_FILES['hinh_anh']['name'];
  
	$parts = explode('.', $filename);
	$file_type = $parts[count($parts) - 1];
	$date = new DateTimeImmutable();
	$filename = md5($filename.$date->getTimestamp()).'.'.$file_type;
	move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../../data/nha_san_xuat/'.$filename);
	$hinh_anh = $filename;

	$sql = "INSERT nha_san_xuat(ten_nha_san_xuat,hinh_anh,trang_thai) VALUES(:ten_nha_san_xuat, :hinh_anh, :trang_thai)";
  $params = array();
  $params['ten_nha_san_xuat'] = $ten_nha_san_xuat;
  $params['hinh_anh'] = $hinh_anh;
  $params['trang_thai'] = $trang_thai;
	execute_command($sql, $params);
	header('location: them_nha_san_xuat.php');
?>