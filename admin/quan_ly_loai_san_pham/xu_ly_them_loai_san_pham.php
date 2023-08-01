<?php
  include '../module/database.php';
  include '../module/javascript.php';
  $ten_loai_san_pham = $_POST['ten_loai_san_pham'];

  $dem = execute_query("SELECT COUNT(*) FROM loai_san_pham WHERE ten_loai_san_pham=:ten_loai_san_pham", array('ten_loai_san_pham' => $ten_loai_san_pham))[0][0];
  if($dem > 0){
    alert('Tên loại sản phẩm đã tồn tại');
    location('them_loai_san_pham.php');
    return;
  }
  $file_name = $_FILES['hinh_anh']['name'];
  $trang_thai = isset($_POST['trang_thai']);

  $parts = explode('.', $file_name); 
  $date = new DateTimeImmutable();
  $file_name = md5($date->getTimestamp().$file_name) . '.'. $parts[count($parts) - 1];
  move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../../data/loai_san_pham/' . $file_name);
  $hinh_anh = $file_name;

  $sql = "INSERT loai_san_pham (ten_loai_san_pham,hinh_anh,trang_thai) VALUES (:ten_loai_san_pham,:hinh_anh,:trang_thai)";  
  $params = array();
  $params['ten_loai_san_pham'] = $ten_loai_san_pham;
  $params['hinh_anh'] = $hinh_anh;
  $params['trang_thai'] = $trang_thai;
  execute_command($sql, $params);
  header("Location: them_loai_san_pham.php", TRUE, 307);
?>