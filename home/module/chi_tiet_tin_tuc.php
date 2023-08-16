<?php
	$ma_tin_tuc = (int)($_GET['id']);
	$params = array('ma_tin_tuc'=>$ma_tin_tuc);
	$tin_tucs = execute_query("SELECT * FROM tin_tuc WHERE ma_tin_tuc=:ma_tin_tuc", $params);
	if(count($tin_tucs) == 0) {
		alert('Tin tức không tồn tại !');
		location('/web_ban_hang/home/gioi_thieu_tat_ca_tin_tuc.php');
		return;
	}
	$tin_tuc = $tin_tucs[0];
  execute_command("UPDATE tin_tuc SET luot_xem = luot_xem + 1 WHERE ma_tin_tuc = :ma_tin_tuc", $params);
?>
<div class="container-md">
  <div class="row">
    <div class="col-md-8">
      <div class="h4 mt-4 font-weight-bold text-uppercase"><?php echo $tin_tuc['tieu_de'] ?></div> 
      <ul style="list-style-type: none;">
        <li class="font-italic text-secondary"> Ngày đăng: <?php echo $tin_tuc['ngay_dang'] ?></li>
        <li class="font-italic h6 mt-2 text-secondary"><?php echo $tin_tuc['tom_tat'] ?></li>        
      </ul>    
      <img class="img-thumbnail img-fluid" src="/web_ban_hang/data/tin_tuc/<?php echo $tin_tuc['hinh_anh'] ?>">    
      <p style='line-height: 28px;' class='text-justify h5 mt-3'><?php echo $tin_tuc['noi_dung']; ?></p>
    </div>
    <div class="col-md-4">
      <div class="title p-2 h6 mt-4 font-weight-bold text-uppercase">Tin cùng chuyên mục</div>    
      <?php
        $ma_loai_tin_tuc = execute_query("SELECT * FROM tin_tuc WHERE ma_tin_tuc = :ma_tin_tuc", $params)[0]['ma_loai_tin_tuc'];
        $params['ma_loai_tin_tuc'] = $ma_loai_tin_tuc;
        $tin_tucs = execute_query("SELECT * FROM tin_tuc WHERE trang_thai = 1 AND ma_loai_tin_tuc = :ma_loai_tin_tuc AND ma_tin_tuc <> :ma_tin_tuc ORDER BY ngay_dang DESC LIMIT 0, 10", $params);
        foreach($tin_tucs as $tin_tuc)
          echo "
            <a href='/web_ban_hang/home/trinh_bay_tin_tuc.php?id={$tin_tuc['ma_tin_tuc']}' class='d-flex mt-3 text-decoration-none text-dark'>
              <img src='/web_ban_hang/data/tin_tuc/{$tin_tuc['hinh_anh']}' class='w-25'>
              <div class='ml-3'>
                <div class='font-italic'>{$tin_tuc['tieu_de']}</div>
              </div>
            </a>  
          ";   
      ?>
      <div class="title p-2 h6 mt-4 font-weight-bold text-uppercase">Tin mới nhất</div>    
      <?php        
        $tin_tucs = execute_query("SELECT * FROM tin_tuc WHERE trang_thai = 1 AND ma_tin_tuc <> :ma_tin_tuc ORDER BY ngay_dang DESC LIMIT 0, 10", array('ma_tin_tuc' => $ma_tin_tuc));
        foreach($tin_tucs as $tin_tuc)
          echo "            
            <a href='/web_ban_hang/home/trinh_bay_tin_tuc.php?id={$tin_tuc['ma_tin_tuc']}' class='d-flex mt-3 text-decoration-none text-dark'>
              <img src='/web_ban_hang/data/tin_tuc/{$tin_tuc['hinh_anh']}' class='w-25'>
              <div class='ml-3'>
                <div class='font-italic'>{$tin_tuc['tieu_de']}</div>
              </div>
            </a>  
          ";   
      ?>
    </div>
  </div>
</div>