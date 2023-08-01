<?php
  $loai_san_phams = execute_query("SELECT * FROM loai_san_pham ORDER BY ma_loai_san_pham");
  $nha_san_xuats = execute_query("SELECT * FROM nha_san_xuat ORDER BY ma_nha_san_xuat");
?>
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  QUẢN LÝ SẢN PHẨM
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN LOẠI SẢN PHẨM
</div>
<div class="col-md-6 p-3">
  <div class="form-group">
    <label for="tu_khoa">Từ khóa</label>
    <input type="text" class="form-control" id="tu_khoa">
  </div>
  <div class="form-group">
    <label for="loai_san_pham">Loại sản phẩm</label>
    <select id="loai_san_pham" class="form-control">
      <?php
        foreach($loai_san_phams as $loai_san_pham)
          echo "<option value='{$loai_san_pham[0]}'>{$loai_san_pham[1]}</option>";
      ?>
    </select>
  </div>  
  <div class="form-group form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Kích hoạt
    </label>
  </div>
</div>
<div class="col-md-6 p-3">
  <div class="form-group">
    <label for="nha_san_xuat">Nhà sản xuất</label>
    <select id="nha_san_xuat" class="form-control">
      <?php
        foreach($nha_san_xuats as $nha_san_xuat)
          echo "<option value='{$nha_san_xuat[0]}'>{$nha_san_xuat[1]}</option>";
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="gia">Giá</label>
    <input type="number" class="form-control" id="gia">
  </div>        
</div>
<div class="col-md-12">
  <div class="form-group">
    <button class="btn font-weight-bold">Tìm kiếm <i class="bi bi-search"></i></button>
    <a href="them_san_pham.php"><button class="btn font-weight-bold ml-2">Thêm sản phẩm <i class="bi bi-plus-circle-fill"></i></button></a>          
  </div>        
</div>