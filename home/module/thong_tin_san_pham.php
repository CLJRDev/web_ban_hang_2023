<?php
  include_once '../admin/module/javascript.php';
  $ma_san_pham = (int)$_GET['id'];
  $san_phams=execute_query("SELECT * FROM v_san_pham WHERE ma_san_pham=:ma_san_pham", array('ma_san_pham'=>$ma_san_pham));
  if(count($san_phams)==0){
    alert("Sản phẩm không tồn tại");
    location("/web_ban_hang/home/trang_chu.php");
    return;
  }
  $san_pham=$san_phams[0];
  execute_command("UPDATE san_pham SET luot_xem = luot_xem + 1 WHERE ma_san_pham = :ma_san_pham", array('ma_san_pham'=>$ma_san_pham));
?>
<div class="container-md">
  <div class="row">
    <div class="title col-lg-12 h4 p-3 mt-3 font-weight-bold text-uppercase"><?php echo $san_pham['ten_san_pham'] ?></div>
    <div class="col-md-5">
      <img class="img-thumbnail img-fluid mt-3" src="/web_ban_hang/data/san_pham/<?php echo $san_pham['hinh_anh'] ?>">
    </div>
    <div class="col-md-7 overflow-auto">
      <ul id="price" class="ml-4 mt-3">
        <li>Giá: <?php echo $san_pham['gia_khuyen_mai'] ?>₫</li>
        <li>Lượt xem: <?php echo $san_pham['luot_xem'] ?></li>
        <li>Loại sản phẩm: <?php echo $san_pham['ten_loai_san_pham'] ?></li>
        <li>Nhà sản xuất: <?php echo $san_pham['ten_nha_san_xuat'] ?></li>
      </ul>
      <h4 class="p-2 font-weight-bold">Mô tả sản phẩm</h4>
      <p class="border rounded p-3"><?php echo $san_pham['mo_ta'] ?></p>
      <a href="/web_ban_hang/home/xu_ly_mua_ngay.php?id=<?php echo $ma_san_pham ?>"><button class="btn btn-danger">Mua ngay</button></a>
      <a href="/web_ban_hang/home/xu_ly_them_gio_hang.php?id=<?php echo $ma_san_pham ?>"><button class="btn btn-info">Thêm giỏ hàng <i class="bi bi-cart-plus"></i></button></a>
    </div>
  </div>
</div>