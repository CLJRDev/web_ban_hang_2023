<?php
  session_start();
  include '../module/database.php';
  include '../module/javascript.php';
  $ma_san_pham = $_POST['ma_san_pham'];
  $ten_san_pham = $_POST['ten_san_pham'];
  $loai_san_pham = $_POST['loai_san_pham'];
  $nha_san_xuat = $_POST['nha_san_xuat'];
  $gia = $_POST['gia'];
  $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
  $file_name = $_FILES['hinh_anh']['name'];
  $trang_thai = isset($_POST['trang_thai']);
  $mo_ta = $_POST['mo_ta'];

  $params = array();
  $params['ma_san_pham'] = $ma_san_pham;
  $params['ten_san_pham'] = $ten_san_pham;
  $data = execute_query("SELECT COUNT(*) AS dem FROM san_pham WHERE ten_san_pham = :ten_san_pham AND ma_san_pham <> :ma_san_pham", $params);
  if($data[0]['dem'] > 0){
    alert('Tên sản phẩm đã tồn tại');
		location("sua_san_pham.php?id={$ma_san_pham}");
		return;
  }

  $sql = "";
  if($file_name == ''){    
    $sql = "UPDATE san_pham SET ten_san_pham = :ten_san_pham, ma_loai_san_pham = :ma_loai_san_pham, ma_nha_san_xuat = :ma_nha_san_xuat, gia = :gia, gia_khuyen_mai = :gia_khuyen_mai, trang_thai = :trang_thai, mo_ta = :mo_ta WHERE ma_san_pham = :ma_san_pham";
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

    $sql = "UPDATE san_pham SET ten_san_pham = :ten_san_pham, ma_loai_san_pham = :ma_loai_san_pham, ma_nha_san_xuat = :ma_nha_san_xuat, hinh_anh = :hinh_anh, gia = :gia, gia_khuyen_mai = :gia_khuyen_mai, trang_thai = :trang_thai, mo_ta = :mo_ta WHERE ma_san_pham = :ma_san_pham";
    $params['hinh_anh'] = $hinh_anh;
  }
  $params['ma_loai_san_pham'] = $loai_san_pham;
  $params['ma_nha_san_xuat'] = $nha_san_xuat;
  $params['gia'] = $gia;
  $params['gia_khuyen_mai'] = $gia_khuyen_mai;
  $params['trang_thai'] = $trang_thai;
  $params['mo_ta'] = $mo_ta;
  execute_command($sql,$params); 
  header("Location: sua_san_pham.php?id={$ma_san_pham}", TRUE, 307);
?>
