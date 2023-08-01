<?php
    $loai_san_phams = execute_query("SELECT * FROM loai_san_pham ORDER BY ma_loai_san_pham");
    $nha_san_xuats = execute_query("SELECT * FROM nha_san_xuat ORDER BY ma_nha_san_xuat");
?>
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  THÊM SẢN PHẨM
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN SẢN PHẨM
</div>  
<div class="col-md-6 px-3 pt-3">
  <div class="form-group">
    <label for="ten_san_pham">Tên sản phẩm</label>
    <input name="ten_san_pham" type="text" class="form-control require" id="ten_san_pham">
  </div>
  <div class="form-group">
    <label for="loai_san_pham">Loại sản phẩm</label>
    <select name="loai_san_pham" id="loai_san_pham" class="form-control">
      <?php
        foreach($loai_san_phams as $loai_san_pham)
          echo "<option value='{$loai_san_pham[0]}'>{$loai_san_pham[1]}</option>";
      ?>
    </select>
  </div>  
  <div class="form-group">
    <label for="nha_san_xuat">Nhà sản xuất</label>
    <select name="nha_san_xuat" id="nha_san_xuat" class="form-control">
      <?php
        foreach($nha_san_xuats as $nha_san_xuat)
          echo "<option value='{$nha_san_xuat[0]}'>{$nha_san_xuat[1]}</option>";
      ?>
    </select>
  </div>
</div>
<div class="col-md-6 px-3 pt-3">        
  <div class="form-group">
    <label for="gia">Giá</label>
    <input name="gia" type="number" class="form-control require positive_number" id="gia">
  </div>    
  <div class="form-group">
    <label for="hinh_anh">Hình ảnh</label>
    <div class="custom-file">
      <input name="hinh_anh" type="file" class="custom-file-input" id="hinh_anh">
      <label class="custom-file-label" for="customFile">Chọn file ảnh</label>
    </div>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input name="trang_thai" type="checkbox" class="form-check-input">
      Kích hoạt
    </label>
  </div>    
</div>
<div class="col-md-12 px-3">
  <div class="form-group">
    <label for="mo_ta">Mô tả</label>
    <textarea name="mo_ta" class="form-control require" id="mo_ta" rows="4"></textarea>
  </div>
</div>
<div class="col-md-12 px-3">
  <div class="form-group">
    <button type="submit" class="btn font-weight-bold">Thêm sản phẩm <i class="bi bi-plus-circle-fill"></i></button>
  </div>        
</div>