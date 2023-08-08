<?php
	include '../module/database.php';
  include '../module/javascript.php';
	$ma_nha_san_xuat = $_POST['ma_nha_san_xuat'];
  $ten_nha_san_xuat = $_POST['ten_nha_san_xuat'];
	$trang_thai = isset($_POST['trang_thai']);
	$filename = $_FILES['hinh_anh']['name'];

  $params = array();
  $params['ma_nha_san_xuat'] = $ma_nha_san_xuat;
  $params['ten_nha_san_xuat'] = $ten_nha_san_xuat;
  $data = execute_query("SELECT COUNT(*) AS dem FROM nha_san_xuat WHERE ten_nha_san_xuat = :ten_nha_san_xuat AND ma_nha_san_xuat <> :ma_nha_san_xuat", $params);
  if($data[0]['dem'] > 0){
    alert('Nhà sản xuất đã tồn tại');
    location("sua_nha_san_xuat.php?id={$ma_nha_san_xuat}");
    return;
  }
  if($filename == ''){    
		$sql = "UPDATE nha_san_xuat SET ten_nha_san_xuat = :ten_nha_san_xuat, trang_thai = :trang_thai	WHERE ma_nha_san_xuat = :ma_nha_san_xuat";  
	}
	else{
		$hinh_anh = execute_query("SELECT hinh_anh FROM nha_san_xuat WHERE ma_nha_san_xuat = :ma_nha_san_xuat", $params);
		unlink('../../data/nha_san_xuat/'.$hinh_anh[0][0]);
		$parts = explode('.', $filename);
		$file_type = $parts[count($parts) - 1];
		$date = new DateTimeImmutable();
		$filename = md5($filename.$date->getTimestamp()).'.'.$file_type;
		move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../../data/nha_san_xuat/'.$filename);
		$hinh_anh = $filename;

    $params['hinh_anh'] = $hinh_anh;
		$sql = "UPDATE nha_san_xuat SET ten_nha_san_xuat = :ten_nha_san_xuat, hinh_anh = :hinh_anh, trang_thai = :trang_thai	WHERE ma_nha_san_xuat = :ma_nha_san_xuat";  
	}
  $params['trang_thai'] = $trang_thai;
  execute_command($sql, $params);
	header("location: sua_nha_san_xuat.php?id={$ma_nha_san_xuat}");
?>