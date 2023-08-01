<?php
  $param = array('ma_san_pham' => $_GET['id']);
  $data = execute_query("SELECT * FROM san_pham WHERE ma_san_pham = :ma_san_pham", $param);
  if(count($data) == 0){
    alert('Sản phẩm không tồn tại');
    location('quan_ly_san_pham.php');
    return;
  }else
    $san_pham = $data[0];
  $loai_san_phams = execute_query("SELECT * FROM loai_san_pham ORDER BY ma_loai_san_pham");
  $nha_san_xuats = execute_query("SELECT * FROM nha_san_xuat ORDER BY ma_nha_san_xuat");
?>
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  SỬA SẢN PHẨM
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN SẢN PHẨM
</div>
<div class="col-md-7 p-3">
  <input type="text" name="ma_san_pham" style="display: none;" value = "<?php echo $san_pham['ma_san_pham']; ?>">
  <div class="form-group">
    <label for="ten_san_pham">Tên sản phẩm</label>
    <input type="text" class="form-control require" id="ten_san_pham" name="ten_san_pham" value ="<?php echo $san_pham['ten_san_pham']; ?>">
  </div>
  <div class="form-group">
    <label for="loai_san_pham">Loại sản phẩm</label>
    <select name="loai_san_pham" id="loai_san_pham" class="form-control">
      <?php
        foreach($loai_san_phams as $loai_san_pham){
          if($loai_san_pham[0] == $san_pham['ma_loai_san_pham'])
            echo "<option selected value='{$loai_san_pham[0]}'>{$loai_san_pham[1]}</option>";
          else
            echo "<option value='{$loai_san_pham[0]}'>{$loai_san_pham[1]}</option>";
        }          
      ?>
    </select>
  </div>  
  <div class="form-group">
    <label for="nha_san_xuat">Nhà sản xuất</label>
    <select name="nha_san_xuat" id="nha_san_xuat" class="form-control">
      <?php
        foreach($nha_san_xuats as $nha_san_xuat){
          if($nha_san_xuat[0] == $san_pham['ma_nha_san_xuat'])
            echo "<option selected value='{$nha_san_xuat[0]}'>{$nha_san_xuat[1]}</option>";
          else
            echo "<option value='{$nha_san_xuat[0]}'>{$nha_san_xuat[1]}</option>";
        }
          
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="hinh_anh">Hình ảnh</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="hinh_anh" name="hinh_anh">
        <label class="custom-file-label" for="customFile">Chọn file ảnh</label>
    </div>
  </div>
  <div class="form-group">
    <label for="gia">Giá</label>
    <input type="number" class="form-control require positive_number" id="gia" name="gia" value="<?php echo $san_pham['gia']; ?>">
  </div> 
  <div class="form-group form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="trang_thai" <?php if($san_pham['trang_thai'] == 1) echo 'checked'; ?>>
      Kích hoạt
    </label>
  </div>
</div>
<div class="col-md-5 p-3 d-flex justify-content-center align-items-center">
  <img class="img-thumbnail" src="../../data/san_pham/<?php echo $san_pham['2']; ?>" style="object-fit: cover; width: 300px;">
</div>
<div class="col-md-12 px-3">
  <div class="form-group">
    <label for="mo_ta">Mô tả</label>
    <textarea class="form-control require" id="mo_ta" rows="4" name="mo_ta"><?php echo $san_pham['mo_ta']; ?></textarea>
  </div>
</div>
<div class="col-md-12 px-3">
  <div class="form-group">
    <button type="submit" class="btn font-weight-bold">Cập nhập sản phẩm <i style="font-size: 20px;" class='bx bxs-edit'></i></button>
  </div>        
</div>	