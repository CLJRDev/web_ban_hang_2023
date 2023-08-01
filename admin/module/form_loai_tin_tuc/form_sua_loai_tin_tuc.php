<?php
  $ma_loai_tin_tuc = $_GET['id']; 
  $params = array('ma_loai_tin_tuc' => $ma_loai_tin_tuc);
  $data = execute_query("SELECT * FROM loai_tin_tuc WHERE ma_loai_tin_tuc = ". $ma_loai_tin_tuc);
  if(count($data) == 0){
    alert('Mã loại tin tức không tồn tại');
    location('them_loai_tin_tuc.php');
    return;
  }else
    $loai_tin_tuc = $data[0];
?>
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  SỬA LOẠI TIN TỨC
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN LOẠI TIN TỨC
</div>
<div class="col-md-6 p-3">
  <div class="form-group">
    <label for="ma_loai_tin_tuc">Mã loại tin tức</label>
    <input readonly type="text" class="form-control" name="ma_loai_tin_tuc" id="ma_loai_tin_tuc" value="<?php echo $loai_tin_tuc[0];?>">
</div>
  <div class="form-group">
    <label for="ten_loai_tin_tuc">Tên loại tin tức</label>
    <input type="text" class="form-control require" name="ten_loai_tin_tuc" id="ten_loai_tin_tuc" value="<?php echo $loai_tin_tuc[1];?>">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input type="checkbox" name="trang_thai" class="form-check-input" <?php if($loai_tin_tuc[2] == 1) echo 'checked';?>>
      Kích hoạt
    </label>
  </div>
</div>
<div class="col-md-6 p-2">
  
</div>
<div class="col-md-12">
  <div class="form-group">
    <button class="btn font-weight-bold">Sửa loại tin tức <i class="bi bi-pencil-square"></i></button>
  </div>
</div>