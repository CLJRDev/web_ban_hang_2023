<?php
	session_start();
	include '../module/database.php';
	include '../module/javascript.php';
	$tai_khoan = $_POST['ten_tai_khoan'];
	$mat_khau = md5($_POST['mat_khau']);
	$params = array();
	$params['tai_khoan'] = $tai_khoan;
	$data = execute_query("SELECT mat_khau, trang_thai FROM nguoi_dung WHERE tai_khoan = :tai_khoan", $params);
  if(count($data) == 0){
		alert('Tên tài khoản không tồn tại.');
		location('dang_nhap.php');
		return;
	}
  if($data[0]['trang_thai'] != 1){
    alert('Tài khoản đã bị khóa.');
		location('dang_nhap.php');
		return;
  }
  if($mat_khau != $data[0]['mat_khau']){
    alert('Sai mật khẩu.');
    location('dang_nhap.php');
    return;
  }else{
    $_SESSION['dang_nhap'] = $tai_khoan;
    location('../quan_ly_san_pham/quan_ly_san_pham.php');
  }
?>