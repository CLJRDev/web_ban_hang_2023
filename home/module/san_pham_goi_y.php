<div class="container-md">
  <div class="row">
    <div class="title col-lg-12 h5 p-3 mt-3 font-weight-bold">Sản phẩm cùng loại</div>
    <?php
      $san_pham_cung_loais = execute_query("SELECT * FROM v_san_pham WHERE ma_loai_san_pham=:ma_loai_san_pham AND ma_san_pham!= :ma_san_pham AND trang_thai=1", array('ma_loai_san_pham'=>$san_pham['ma_loai_san_pham'],'ma_san_pham'=>$san_pham['ma_san_pham']));
      foreach($san_pham_cung_loais as $san_pham_cung_loai)
        echo '<div class="col-md-3">
        <div class="product-container text-center overflow-hidden p-3 my-3">
          <a href="/web_ban_hang/home/trinh_bay_san_pham.php?id='.$san_pham_cung_loai['ma_san_pham'].'" class="banner_img_container d-block"> <img class="product-img" style="width: 200px;" src="/web_ban_hang/data/san_pham/'.$san_pham_cung_loai['hinh_anh'].'"></a>
          <div class="font-weight-bold h6 mt-3">'.$san_pham_cung_loai['ten_san_pham'].'</div>
          <div class="text-danger">Giá: '.$san_pham_cung_loai['gia_khuyen_mai'].'₫ <span class="text-dark" style="text-decoration-line: line-through; font-size: 15px;">'.$san_pham_cung_loai['gia'].'₫</span></div>
          <div class="text-info">'.$san_pham_cung_loai['luot_xem'].' Lượt xem</div>
        </div>
      </div>';
    ?>
  </div>    
</div>
<div class="container-md">
  <div class="row">
    <div class=" title col-lg-12 h5 p-3 mt-3 font-weight-bold">Sản phẩm cùng nhà sản xuất</div>
    <?php
      $san_pham_cung_nsxs = execute_query("SELECT * FROM v_san_pham WHERE ma_nha_san_xuat=:ma_nha_san_xuat AND ma_san_pham!= :ma_san_pham AND trang_thai=1", array('ma_nha_san_xuat'=>$san_pham['ma_nha_san_xuat'],'ma_san_pham'=>$san_pham['ma_san_pham']));
      foreach($san_pham_cung_nsxs as $san_pham_cung_nsx)
        echo '<div class="col-md-3">
        <div class="product-container text-center overflow-hidden p-3 my-3">
          <a href="/web_ban_hang/home/trinh_bay_san_pham.php?id='.$san_pham_cung_nsx['ma_san_pham'].'" class="banner_img_container d-block"> <img class="product-img" style="width: 200px;" src="/web_ban_hang/data/san_pham/'.$san_pham_cung_nsx['hinh_anh'].'"></a>
          <div class="font-weight-bold h6 mt-3">'.$san_pham_cung_nsx['ten_san_pham'].'</div>
          <div class="text-danger">Giá: '.$san_pham_cung_nsx['gia_khuyen_mai'].'₫ <span class="text-dark" style="text-decoration-line: line-through; font-size: 15px;">'.$san_pham_cung_loai['gia'].'₫</span></div>
          <div class="text-info">'.$san_pham_cung_nsx['luot_xem'].' Lượt xem</div>
        </div>
      </div>';
    ?>
  </div>    
</div>