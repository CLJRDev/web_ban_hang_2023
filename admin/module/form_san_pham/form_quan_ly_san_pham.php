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
    <input type="text" class="form-control tu_khoa" id="tu_khoa" name="tu_khoa" value="<?php if(isset($_SESSION['tu_khoa_san_pham'])) echo $_SESSION['tu_khoa_san_pham']; ?>">
  </div>
  <div class="form-group">
    <label for="loai_san_pham">Loại sản phẩm</label>
    <select name="ma_loai_san_pham" id="loai_san_pham" class="form-control loai_san_pham">
      <?php
        echo '<option value="-1">Tất cả</option>';
        foreach($loai_san_phams as $loai_san_pham){
          if($_SESSION['ma_loai_san_pham'] == $loai_san_pham['ma_loai_san_pham'])
            echo "<option selected value='{$loai_san_pham[0]}'>{$loai_san_pham[1]}</option>";
          else
            echo "<option value='{$loai_san_pham[0]}'>{$loai_san_pham[1]}</option>";
        }
          
      ?>
    </select>
  </div>  
  <div class="form-group">
    <label>Trạng thái</label>
    <select name="trang_thai" class="form-control trang_thai">
      <?php
        $trang_thais = array('-1' => 'Tất cả', '0' => 'Khóa', '1' => 'Kích hoạt');
        foreach($trang_thais as $key => $value){
          if($_SESSION['trang_thai_san_pham'] == $key)
            echo "<option selected value='{$key}'>$value</option>";
          else
            echo "<option value='{$key}'>$value</option>";
        }
      ?>                                       
    </select>
  </div>
</div>
<div class="col-md-6 p-3">
  <div class="form-group">
    <label for="nha_san_xuat">Nhà sản xuất</label>
    <select name="ma_nha_san_xuat" id="nha_san_xuat" class="form-control nha_san_xuat">
      <?php
        echo '<option value="-1">Tất cả</option>';
        foreach($nha_san_xuats as $nha_san_xuat){
          if($_SESSION['ma_nha_san_xuat'] == $nha_san_xuat['ma_nha_san_xuat'])
            echo "<option selected value='{$nha_san_xuat['ma_nha_san_xuat']}'>{$nha_san_xuat['ten_nha_san_xuat']}</option>"; 
          else
            echo "<option value='{$nha_san_xuat['ma_nha_san_xuat']}'>{$nha_san_xuat['ten_nha_san_xuat']}</option>"; 
        }          
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="tu_gia">Từ giá</label>
    <input name="tu_gia" type="number" class="form-control tu_gia" id="tu_gia" value="<?php if(isset($_SESSION['tu_gia'])) echo $_SESSION['tu_gia'];?>">
  </div>  
  <div class="form-group">
    <label for="den_gia">Đến giá</label>
    <input name="den_gia" type="number" class="form-control den_gia" id="den_gia" value="<?php if(isset($_SESSION['den_gia'])) echo $_SESSION['den_gia'];?>">
  </div>        
</div>
<div class="col-md-12">
  <div class="form-group">
    <button type="submit" class="btn font-weight-bold">Tìm kiếm <i class="bi bi-search"></i></button>
    <a href="them_san_pham.php"><button type="button" class="btn font-weight-bold">Thêm sản phẩm <i class="bi bi-plus-circle-fill"></i></button></a>          
    <button type="button" class="btn font-weight-bold lam_moi">Làm mới</button>
  </div>        
</div>
<script>
  const butLamMoi = document.querySelector('.lam_moi');
  const tuKhoaElement = document.querySelector('.tu_khoa');
  const tuGiaElement = document.querySelector('.tu_gia');
  const denGiaElement = document.querySelector('.den_gia');
  const loaiSanPhamElement = document.querySelector('.loai_san_pham');
  const nhaSanXuatElement = document.querySelector('.nha_san_xuat');
  const trangThaiElement = document.querySelector('.trang_thai');
  butLamMoi.addEventListener('click', () =>{
    tuKhoaElement.value = '';
    tuGiaElement.value = '';
    denGiaElement.value = '';
    loaiSanPhamElement.selectedIndex = 0;
    nhaSanXuatElement.selectedIndex = 0;
    trangThaiElement.selectedIndex = 0;
  });
</script>