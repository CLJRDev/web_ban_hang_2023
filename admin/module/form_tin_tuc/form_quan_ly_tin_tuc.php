<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
    QUẢN LÝ TIN TỨC
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
    THÔNG TIN TIN TỨC
</div>
<div class="col-md-6 p-3">
    <div class="form-group">
        <label for="tu_khoa">Từ khóa</label>
        <input name="tu_khoa" type="text" class="form-control tu_khoa" id="tu_khoa" value="<?php
          if(isset($_SESSION['tu_khoa_tin_tuc'])) echo $_SESSION['tu_khoa_tin_tuc'];
        ?>" >
    </div>
    <div class="form-group">
        <label for="tu_ngay">Từ ngày</label>
        <input name="tu_ngay" placeholder="dd/mm/yyyy" type="text" class="form-control tu_ngay" id="tu_ngay" value="<?php 
          if(isset($_SESSION['tu_ngay_tin_tuc']))
            if($_SESSION['tu_ngay_tin_tuc'] != '') 
              echo format_date_vn($_SESSION['tu_ngay_tin_tuc']); 
        ?>">
    </div>
    <div class="form-group">
        <label for="den_ngay">Đến ngày</label>
        <input name="den_ngay" placeholder="dd/mm/yyyy" type="text" class="form-control den_ngay" id="den_ngay" value="<?php 
          if(isset($_SESSION['den_ngay_tin_tuc']))
            if($_SESSION['den_ngay_tin_tuc'] != '') 
              echo format_date_vn($_SESSION['den_ngay_tin_tuc']); 
        ?>">  
    </div>    
</div>
<div class="col-md-6 p-3">
  <div class="form-group">
    <label>Loại tin tức</label>
    <select name="ma_loai_tin_tuc" class="form-control loai_tin_tuc">
      <?php
        echo "<option value='-1'>Tất cả</option>";
        $loai_tin_tucs = execute_query("SELECT * FROM loai_tin_tuc WHERE trang_thai=1");
        foreach($loai_tin_tucs as $loai_tin_tuc){
          if($_SESSION['ma_loai_tin_tuc'] == $loai_tin_tuc['ma_loai_tin_tuc'])
            echo '<option selected value="'.$loai_tin_tuc['ma_loai_tin_tuc'].'">'.$loai_tin_tuc['ten_loai_tin_tuc'].'</option>';
          else
            echo '<option value="'.$loai_tin_tuc['ma_loai_tin_tuc'].'">'.$loai_tin_tuc['ten_loai_tin_tuc'].'</option>';
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
          if($_SESSION['trang_thai_tin_tuc'] == $key)
            echo "<option selected value='{$key}'>$value</option>";
          else
            echo "<option value='{$key}'>$value</option>";
        }
      ?>                                       
    </select>
  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <button type="submit" class="btn font-weight-bold">Tìm kiếm <i class="bi bi-search"></i></button>
    <a href="them_tin_tuc.php"><button type="button" class="btn font-weight-bold">Thêm tin tức <i class="bi bi-plus-circle-fill"></i></button></a>          
    <button type="button" class="btn font-weight-bold lam_moi">Làm mới</button>
  </div>
</div>
<script>
  const butLamMoi = document.querySelector('.lam_moi');
  const tuKhoaElement = document.querySelector('.tu_khoa');
  const ngayTuElement = document.querySelector('.tu_ngay');
  const ngayDenElement = document.querySelector('.den_ngay');
  const loaiTinTucElement = document.querySelector('.loai_tin_tuc');
  const trangThaiElement = document.querySelector('.trang_thai');
  butLamMoi.addEventListener('click', () =>{
    tuKhoaElement.value = '';
    ngayTuElement.value = '';
    ngayDenElement.value = '';
    loaiTinTucElement.selectedIndex = 0;
    trangThaiElement.selectedIndex = 0;
  });
</script>