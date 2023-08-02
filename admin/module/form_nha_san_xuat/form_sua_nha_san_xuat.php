<?php
  $param = array('ma_nha_san_xuat' => $_GET['id']);
	$data = execute_query("SELECT * FROM nha_san_xuat WHERE ma_nha_san_xuat= :ma_nha_san_xuat", $param);
  if(count($data) == 0){
    alert('Nhà sản xuất không tồn tại');
    location('them_nha_san_xuat.php');
    return;
  }else
    $nha_san_xuat = $data[0];
?>
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
    SỬA NHÀ SẢN XUẤT
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
    THÔNG TIN NHÀ SẢN XUẤT
</div>
<div class="col-md-7 p-3">
    <input type="text" hidden id="ma_nha_san_xuat" name="ma_nha_san_xuat" value="<?php echo $nha_san_xuat['ma_nha_san_xuat'] ?>">
    <div class="form-group">
        <label for="ten_nha_san_xuat">Tên nhà sản xuất</label>
        <input type="text" class="form-control require" id="ten_nha_san_xuat" name="ten_nha_san_xuat" value="<?php echo $nha_san_xuat['ten_nha_san_xuat'] ?>">
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
            <input type="checkbox" class="form-check-input" name="trang_thai" <?php if ($nha_san_xuat['trang_thai'] == 1) echo 'checked'; ?>>
            Kích hoạt
        </label>
    </div>
</div>
<div class="col-md-5 p-3 d-flex justify-content-center align-items-center">
    <img class="img-thumbnail img-fluid mt-3" src="../../data/nha_san_xuat/<?php echo $nha_san_xuat['hinh_anh']; ?>" style="object-fit: cover; width: 250px;">
</div>
<div class="col-md-12">
    <div class="form-group">
        <button class="btn font-weight-bold">Sửa nhà sản xuất <i class="bi bi-pencil-square"></i></button>
    </div>
</div>