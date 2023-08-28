<?php
  include_once '../admin/module/database.php';
  include_once '../admin/module/javascript.php';
  $gio_hang = execute_query("SELECT ma_gio_hang, ten_san_pham, hinh_anh, gia, gia_khuyen_mai FROM gio_hang INNER JOIN san_pham ON gio_hang.ma_san_pham = san_pham.ma_san_pham");
?>
<div class="container-md">
  <div class="row p-3">
    <div class="col-md-8">
      <div class="h5 text-center font-weight-bold">Giỏ hàng của bạn</div>
      <?php
        foreach($gio_hang as $item)
          echo "<div class='border-top d-flex p-3 justify-content-center align-items-center'>
                  <img style='width: 100px' src='../data/san_pham/{$item['hinh_anh']}'>
                  <div class='mr-5 ml-2'>
                    <div class='h5'>{$item['ten_san_pham']}</div>
                    <div class='text-info'>".format_vn_number($item['gia_khuyen_mai'])." đ</div>
                  </div>      
                  <a class='ml-auto' href='/web_ban_hang/home/xu_ly_xoa_don_hang.php?id={$item['ma_gio_hang']}'><i class=' h5 bi bi-trash'></i></a>
                </div>";  
        
      ?>             
    </div>   
    <div class="d-flex p-3 align-items-center col-md-4">
      <?php
        $tong_tien = execute_query("SELECT SUM(gia_khuyen_mai) FROM gio_hang INNER JOIN san_pham ON gio_hang.ma_san_pham = san_pham.ma_san_pham")[0][0];
      ?>
      <div class="text-danger font-weight-bold mr-3">Tổng tiền: <?php echo format_vn_number($tong_tien); ?> đ</div>  
      <a href="/web_ban_hang/home/thanh_toan.php"><button class="btn btn-danger">Mua ngay</button></a>
    </div>    
  </div>
</div>