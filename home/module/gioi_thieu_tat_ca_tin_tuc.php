<div class="container-fluid position-relative">
  <div class="p-3 sidebar mt-3 d-flex flex-column position-absolute">
    <div class="sidebar-title font-weight-bold h5">Loại tin tức</div>
    <?php      
      $loai_tin_tucs = execute_query("SELECT * FROM loai_tin_tuc");      
      foreach($loai_tin_tucs as $loai_tin_tuc)
        echo "<a href='gioi_thieu_tin_tuc_theo_loai.php?id={$loai_tin_tuc['ma_loai_tin_tuc']}'><div class='text-dark font-weight-bold mb-1'>{$loai_tin_tuc['ten_loai_tin_tuc']}</div></a>";
    ?>
  </div>    
  <div class="container-md">
    <div class="row">
      <div class='col-lg-12 h4 p-3 m-3 font-weight-bold text-uppercase title'>Tất cả tin tức</div>
      <?php                       
        $page_index = 1;
        $page_length = 10;
        if(isset($_GET['pid']))
          $page_index = $_GET['pid'];
        $page_start = ($page_index - 1) * $page_length;
        $sql = "SELECT * FROM tin_tuc WHERE trang_thai = 1 LIMIT {$page_start}, {$page_length}";
        $tin_tucs = execute_query($sql);
        foreach($tin_tucs as $tin_tuc)
          echo "
            <div class='col-md-12 d-flex align-content-center pb-4'>
              <img src='/web_ban_hang/data/tin_tuc/{$tin_tuc['hinh_anh']}' class='img_news'>
              <div class='news_info ml-3'>
                <h4 class='news_title font-weight-bold m-0 mb-2'>{$tin_tuc['tieu_de']}</h4>
                <div class='date_views font-italic mb-2'>Ngày đăng: {$tin_tuc['ngay_dang']} - Lượt xem: {$tin_tuc['luot_xem']}</div>
                <div class='summary'>
                  <p>{$tin_tuc['tom_tat']}</p>       
                </div>
              </div>
            </div>  
          ";        
      ?>
      <div class="col-md-12">
        <div class="pagination d-flex justify-content-center">
          <ul class="pagination">
            <?php
              $row_number = execute_query("SELECT COUNT(*) AS dem FROM tin_tuc WHERE trang_thai=1")[0]['dem'];
              $page_number = (int) $row_number / $page_length;
              if($row_number % $page_length != 0)
                $page_number++;
              for($i = 1; $i <= $page_number; $i++)
                echo "<li class='page-item'>
                  <a href='/web_ban_hang/home/gioi_thieu_tat_ca_tin_tuc.php?pid={$i}' class='page-link'>{$i}</a>
                </li>";
            ?>
          </ul>
        </div>
      </div>
    </div>    
  </div>
</div>