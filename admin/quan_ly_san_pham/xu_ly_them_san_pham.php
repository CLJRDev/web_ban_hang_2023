<?php
  include '../module/database.php';  
  $ten_san_pham = $_POST['ten_san_pham'];
  $loai_san_pham = $_POST['loai_san_pham'];
  $nha_san_xuat = $_POST['nha_san_xuat'];
  $gia = $_POST['gia'];
  $file_name = $_FILES['hinh_anh']['name'];
  $trang_thai = isset($_POST['trang_thai']);
  $mo_ta = $_POST['mo_ta'];

  $parts = explode('.', $file_name); 
  $date = new DateTimeImmutable();
  $file_name = md5($date->getTimestamp().$file_name) . '.'. $parts[count($parts) - 1];
  move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../../data/san_pham/' . $file_name);
  $hinh_anh = $file_name; 

  $sql = "INSERT san_pham (ten_san_pham,hinh_anh,gia,mo_ta,luot_xem,trang_thai,ma_loai_san_pham,ma_nha_san_xuat,tai_khoan) VALUES
  (:ten_san_pham, :hinh_anh, :gia, :mo_ta,100, :trang_thai, :ma_loai_san_pham, :ma_nha_san_xuat,'admin')";
  $params = array();
  $params['ten_san_pham'] = $ten_san_pham;
  $params['hinh_anh'] = $hinh_anh;
  $params['gia'] = $gia;
  $params['mo_ta'] = $mo_ta;
  $params['trang_thai'] = $trang_thai;
  $params['ma_loai_san_pham'] = $loai_san_pham;
  $params['ma_nha_san_xuat'] = $nha_san_xuat;

  execute_command($sql,$params);
  header("Location: quan_ly_san_pham.php", TRUE, 307);
?>