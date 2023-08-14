<?php
  session_start();
  include '../module/database.php';  
  include '../module/javascript.php';
  $ten_san_pham = $_POST['ten_san_pham'];
  $loai_san_pham = $_POST['loai_san_pham'];
  $nha_san_xuat = $_POST['nha_san_xuat'];
  $gia = $_POST['gia'];
  $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
  $file_name = $_FILES['hinh_anh']['name'];
  $trang_thai = isset($_POST['trang_thai']);
  $mo_ta = $_POST['mo_ta'];

  $params = array();
  $params['ten_san_pham'] = $ten_san_pham;
  $data = execute_query("SELECT COUNT(*) AS dem FROM san_pham WHERE ten_san_pham = :ten_san_pham", $params);
  if($data[0]['dem'] > 0){
    alert('Tên sản phẩm đã tồn tại');
		location('them_san_pham.php');
		return;
  }
  
  $parts = explode('.', $file_name); 
  $date = new DateTimeImmutable();
  $file_name = md5($date->getTimestamp().$file_name) . '.'. $parts[count($parts) - 1];
  move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../../data/san_pham/' . $file_name);
  $hinh_anh = $file_name; 

  $sql = "INSERT san_pham (ten_san_pham,hinh_anh,gia,gia_khuyen_mai,mo_ta,luot_xem,trang_thai,ma_loai_san_pham,ma_nha_san_xuat,tai_khoan) VALUES
  (:ten_san_pham, :hinh_anh, :gia, :gia_khuyen_mai, :mo_ta, 0, :trang_thai, :ma_loai_san_pham, :ma_nha_san_xuat, :tai_khoan)";
  $params['hinh_anh'] = $hinh_anh;
  $params['gia'] = $gia;
  $params['gia_khuyen_mai'] = $gia_khuyen_mai;
  $params['mo_ta'] = $mo_ta;
  $params['trang_thai'] = $trang_thai;
  $params['ma_loai_san_pham'] = $loai_san_pham;
  $params['ma_nha_san_xuat'] = $nha_san_xuat;
  $params['tai_khoan'] = $_SESSION['dang_nhap'];
  execute_command($sql,$params);
  header("Location: quan_ly_san_pham.php", TRUE, 307);
?>