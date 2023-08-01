<?php
  $ma_loai_san_pham =  $_GET['id'];
  $param = array('ma_loai_san_pham' => $ma_loai_san_pham);
  $data = execute_query("SELECT * FROM loai_san_pham WHERE ma_loai_san_pham = :ma_loai_san_pham", $param);
  if(count($data) == 0){
    alert('Loại sản phẩm không tồn tại');
    location('them_loai_san_pham.php');
    return;
  }else
    $loai_san_pham = $data[0];
?>
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  SỬA LOẠI SẢN PHẨM
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN LOẠI SẢN PHẨM
</div>
<div class="col-md-7 p-3">
  <input style="display: none;" type="text" name="ma_loai_san_pham" value="<?php echo $loai_san_pham[0] ?>">
  <div class="form-group">
    <label for="ten_loai_san_pham">Tên loại sản phẩm</label>
    <input type="text" class="form-control require" name="ten_loai_san_pham" id="ten_loai_san_pham" value="<?php echo $loai_san_pham[1]; ?>">
  </div>
  <div class="form-group">
    <label for="hinh_anh">Hình ảnh</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="hinh_anh" name="hinh_anh">
        <label class="custom-file-label" for="customFile">Chọn file ảnh</label>
    </div>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input name="trang_thai" type="checkbox" class="form-check-input" <?php if($loai_san_pham[3] == 1){echo 'checked';} ?>>
      Kích hoạt
    </label>
  </div>
</div>
<div class="col-md-5 p-3 d-flex justify-content-center align-items-center">
  <img class="img-thumbnail" src="../../data/loai_san_pham/<?php echo $loai_san_pham[2]; ?>" style="object-fit: cover; width: 250px;">
</div>
<div class="col-md-12">
  <div class="form-group">
    <button type="submit" class="btn font-weight-bold">Cập nhập loại sản phẩm <i class='bx bxs-edit'></i></button>
  </div>
</div>