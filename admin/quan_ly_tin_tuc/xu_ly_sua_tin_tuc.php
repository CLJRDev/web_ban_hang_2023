<?php
	include '../module/database.php';
	$ma_tin_tuc = $_POST['ma_tin_tuc'];
  $tieu_de = $_POST['tieu_de'];
  $ma_loai_tin_tuc = $_POST['ma_loai_tin_tuc'];
  $tom_tat = $_POST['tom_tat'];
  $noi_dung = $_POST['noi_dung'];
	$trang_thai = isset($_POST['trang_thai']);
	$filename = $_FILES['hinh_anh']['name'];

  $sql = "";
  $params = array();
  $params['ma_tin_tuc'] =  $ma_tin_tuc;
  $params['tieu_de'] = $tieu_de;
  $params['tom_tat'] = $tom_tat;
  $params['noi_dung'] = $noi_dung;
  $params['trang_thai'] =  $trang_thai;
  $params['ma_loai_tin_tuc'] =  $ma_loai_tin_tuc;
	if($filename == ''){
		$sql = "UPDATE tin_tuc SET tieu_de =:tieu_de, tom_tat=:tom_tat,	noi_dung=:noi_dung,	trang_thai = :trang_thai,	ma_loai_tin_tuc=:ma_loai_tin_tuc WHERE ma_tin_tuc=:ma_tin_tuc";
	}
	else{
		$hinh_anh = execute_query("SELECT hinh_anh FROM tin_tuc WHERE ma_tin_tuc=".$ma_tin_tuc);
		unlink('../../data/tin_tuc/'.$hinh_anh[0][0]);
		$parts = explode('.', $filename);
		$file_type = $parts[count($parts) - 1];
		$date = new DateTimeImmutable();
		$filename = md5($filename.$date->getTimestamp()).'.'.$file_type;
		move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../../data/tin_tuc/'.$filename);
		$hinh_anh = $filename;

		$sql = "UPDATE tin_tuc SET tieu_de =:tieu_de, tom_tat=:tom_tat,	noi_dung=:noi_dung,	hinh_anh=:hinh_anh,	trang_thai = :trang_thai,	ma_loai_tin_tuc=:ma_loai_tin_tuc WHERE ma_tin_tuc=:ma_tin_tuc";
	  $params['hinh_anh'] = $hinh_anh;
	}
  execute_command($sql, $params);
	header("Location: sua_tin_tuc.php?id={$ma_tin_tuc}",TRUE, 307 );
?>