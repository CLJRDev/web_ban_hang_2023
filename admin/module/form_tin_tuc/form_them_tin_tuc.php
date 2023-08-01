<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  THÊM TIN TỨC 
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
    THÔNG TIN TIN TỨC
</div>
<div class="col-md-6 p-3">
    <div class="form-group">
        <label for="tieu_de">Tiêu đề</label>
        <input type="text" class="form-control require" id="tieu_de" name="tieu_de">
    </div>
    <div class="form-group">
        <label for="loai_tin">Loại tin tức</label>
        <select class="form-control" name="ma_loai_tin_tuc">
            <?php
                $loai_tin_tucs = execute_query("SELECT * FROM loai_tin_tuc WHERE trang_thai=1");
                foreach($loai_tin_tucs as $loai_tin_tuc){
                    echo '<option value="'.$loai_tin_tuc[0].'">'.$loai_tin_tuc[1].'</option>';
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
    <div class="form-group form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="trang_thai">
            Kích hoạt
        </label>
    </div>
</div>
<div class="col-md-12 p-3" style="margin-top: -40px;">
    <div class="form-group">
        <label for="tom_tat">Tóm tắt</label>
        <textarea class="form-control require" id="tom_tat" cols="30" rows="3" name="tom_tat"></textarea> 
    </div>
    <div class="form-group">
        <label for="noi_dung">Nội dung</label>
        <textarea class="form-control require" id="noi_dung" cols="30" rows="10" name="noi_dung"></textarea> 
    </div>
    <div class="form-group pt-3">
        <button class="btn font-weight-bold">Thêm tin tức <i class="bi bi-plus-circle-fill"></i></button>
    </div>
</div>