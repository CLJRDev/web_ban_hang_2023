<?php
	include '../module/database.php';
	include '../module/javascript.php';
	$tieu_de = $_POST['tieu_de'];
	$ma_loai_tin_tuc = $_POST['ma_loai_tin_tuc'];
	$tom_tat = $_POST['tom_tat'];
	$noi_dung = $_POST['noi_dung'];
	$trang_thai = isset($_POST['trang_thai']);
	$filename = $_FILES['hinh_anh']['name'];

	$parts = explode('.', $filename);
	$file_type = $parts[count($parts) - 1];
	$date = new DateTimeImmutable();
	$filename = md5($filename.$date->getTimestamp()).'.'.$file_type;
	move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../../data/tin_tuc/'.$filename);
	$hinh_anh = $filename;
  
	$sql = "INSERT tin_tuc(tieu_de,hinh_anh,tom_tat,noi_dung,ngay_dang,trang_thai,ma_loai_tin_tuc,tai_khoan) VALUES(:tieu_de,:hinh_anh,:tom_tat,:noi_dung,now(),:trang_thai,:ma_loai_tin_tuc,'admin')";
  $params = array();
	$params['tieu_de'] = $tieu_de;
	$params['hinh_anh'] =  $hinh_anh;
	$params['tom_tat'] =  $tom_tat;
	$params['noi_dung'] =  $noi_dung;
	$params['trang_thai'] =  $trang_thai;
	$params['ma_loai_tin_tuc'] =  $ma_loai_tin_tuc;
	execute_command($sql, $params);
  location ('quan_ly_tin_tuc.php');
?>