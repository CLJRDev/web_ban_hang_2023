<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include 'module/head.php';
  ?>
  <title>Thanh toán</title>
</head>
<body>
  <?php
    include 'module/header.php';
  ?>
  <div class="container-md p-3">
    <form action="/web_ban_hang/home/xu_ly_thanh_toan.php" method="post" class="row">
      <div class="text-dark col-md-12 h5 text-center font-weight-bold p-2">Thông tin nhận hàng</div>
      <div class="form-group col-md-6">
        <input class=" form-control" type="text" placeholder="Họ và tên" name="ho_va_ten">
      </div>
      <div class="form-group col-md-6">
        <input class="form-control" name="so_dien_thoai" placeholder="Số điện thoại" type="number">
      </div>      
      <div class="form-group col-md-12">
        <input class="form-control" name="email" placeholder="Email" type="text">
      </div>   
      <div class="form-group col-md-12">
        <textarea class="form-control" name="dia_chi_nhan_hang" placeholder="Địa chỉ nhận hàng" rows="4"></textarea>
      </div>     
      <div class="form-group p-3">
        <?php $tong_tien = execute_query("SELECT SUM(gia_khuyen_mai) FROM gio_hang INNER JOIN san_pham ON gio_hang.ma_san_pham = san_pham.ma_san_pham")[0][0]; ?>
        <div class="mb-2 text-danger font-weight-bold">Tổng tiền: <?php echo format_vn_number($tong_tien); ?>đ</div>
        <button type="submit" class="btn btn-danger font-weight-bold">Thanh toán <i class="bi bi-wallet2"></i></button>
      </div>           
    </form>
  </div>
</body>
</html>