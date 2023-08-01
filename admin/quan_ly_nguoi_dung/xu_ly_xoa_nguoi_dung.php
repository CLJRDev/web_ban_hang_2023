<?php
	include '../module/javascript.php';
  include '../module/database.php';
	$tai_khoan = $_GET['id'];
	execute_command("DELETE FROM nguoi_dung WHERE tai_khoan='".$tai_khoan."'");
	location('them_nguoi_dung.php');
?>