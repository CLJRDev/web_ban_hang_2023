<?php
  include '../admin/module/database.php';
  include '../admin/module/javascript.php';
  $ho_va_ten = $_POST['ho_va_ten'];
  $so_dien_thoai = $_POST['so_dien_thoai'];
  $email = $_POST['email'];
  $dia_chi = $_POST['dia_chi_nhan_hang'];
  $tong_tien = execute_query("SELECT SUM(gia_khuyen_mai) FROM gio_hang INNER JOIN san_pham ON gio_hang.ma_san_pham = san_pham.ma_san_pham")[0][0];
  $sql = "INSERT don_dat_hang(ten_khach_hang, so_dien_thoai, email, dia_chi_nhan_hang, tong_tien) VALUES(:ho_va_ten, :so_dien_thoai, :email, :dia_chi, :tong_tien)";
  $params = array();
  $params['ho_va_ten'] = $ho_va_ten;
  $params['so_dien_thoai'] = $so_dien_thoai;
  $params['email'] = $email;
  $params['dia_chi'] = $dia_chi;
  $params['tong_tien'] = $tong_tien;
  execute_command($sql, $params);  
  $gio_hang = execute_query("SELECT san_pham.ma_san_pham FROM gio_hang INNER JOIN san_pham ON gio_hang.ma_san_pham = san_pham.ma_san_pham");
  $sql = "INSERT chi_tiet_don_hang(ma_don_dat_hang, ma_san_pham) VALUES(:ma_don_dat_hang, :ma_san_pham)";
  $ma_don_dat_hang = execute_query("SELECT ma_don_dat_hang FROM don_dat_hang ORDER BY ma_don_dat_hang DESC LIMIT 1")[0][0];
  foreach($gio_hang as $item)
    execute_command($sql, array('ma_don_dat_hang' => $ma_don_dat_hang, 'ma_san_pham' => $item['ma_san_pham']));
  execute_command("DELETE FROM gio_hang WHERE 1=1");
  location("/web_ban_hang/home/trang_chu.php");
?>