<?php
	include '../module/database.php';
	include '../module/javascript.php';
	$tai_khoan = $_POST['ten_tai_khoan'];
	$mat_khau = md5($_POST['mat_khau']);
	$trang_thai = isset($_POST['trang_thai']);
	$xac_nhan_mat_khau = md5($_POST['xac_nhan_mat_khau']);
	if ($mat_khau != $xac_nhan_mat_khau) {
		alert('Xác nhận mật khẩu không trùng khớp !');
		location('them_nguoi_dung.php');
		return;
	}
	$sql = "UPDATE nguoi_dung SET mat_khau=:mat_khau, trang_thai=:trang_thai WHERE tai_khoan=:tai_khoan";
	$params = array();
  $params['tai_khoan'] = $tai_khoan;
  $params['mat_khau'] =  $mat_khau;
  $params['trang_thai'] =  $trang_thai;
  execute_command($sql, $params);
	location('them_nguoi_dung.php');
?>