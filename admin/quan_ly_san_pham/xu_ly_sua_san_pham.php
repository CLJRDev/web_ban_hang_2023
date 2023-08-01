<?php
  include '../module/database.php';
  $ma_san_pham = $_POST['ma_san_pham'];
  $ten_san_pham = $_POST['ten_san_pham'];
  $loai_san_pham = $_POST['loai_san_pham'];
  $nha_san_xuat = $_POST['nha_san_xuat'];
  $gia = $_POST['gia'];
  $file_name = $_FILES['hinh_anh']['name'];
  $trang_thai = isset($_POST['trang_thai']);
  $mo_ta = $_POST['mo_ta'];

  $sql = "";
  $params = array();
  if($file_name == ''){    
    $sql = "UPDATE san_pham SET ten_san_pham = :ten_san_pham, ma_loai_san_pham = :ma_loai_san_pham, ma_nha_san_xuat = :ma_nha_san_xuat, gia = :gia, trang_thai = :trang_thai, mo_ta = :mo_ta WHERE ma_san_pham = :ma_san_pham";
  }else{
    $sql = "SELECT hinh_anh FROM san_pham WHERE ma_san_pham = :ma_san_pham";
    $params['ma_san_pham'] = $ma_san_pham;
    $hinh_anh = execute_query($sql, $params)[0][0];
    unlink("../../data/san_pham/{$hinh_anh}");
    $parts = explode('.',$hinh_anh);
    $date = new DateTimeImmutable();
    $file_name = md5($date->getTimestamp() . $file_name) . '.' . $parts[count($parts ) - 1];
    move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../../data/san_pham/' . $file_name);
    $hinh_anh = $file_name;

    $sql = "UPDATE san_pham SET ten_san_pham = :ten_san_pham, ma_loai_san_pham = :ma_loai_san_pham, ma_nha_san_xuat = :ma_nha_san_xuat, hinh_anh = :hinh_anh, gia = :gia, trang_thai = :trang_thai, mo_ta = :mo_ta WHERE ma_san_pham = :ma_san_pham";
    $params['hinh_anh'] = $hinh_anh;
  }
  $params['ma_san_pham'] = $ma_san_pham;
  $params['ten_san_pham'] = $ten_san_pham;
  $params['ma_loai_san_pham'] = $loai_san_pham;
  $params['ma_nha_san_xuat'] = $nha_san_xuat;
  $params['gia'] = $gia;
  $params['trang_thai'] = $trang_thai;
  $params['mo_ta'] = $mo_ta;
  execute_command($sql,$params); 
  header("Location: quan_ly_san_pham.php", TRUE, 307);
?>
