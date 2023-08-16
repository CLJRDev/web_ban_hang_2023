<div class="container-fluid position-ralative">
  <div class="p-2 sidebar position-absolute mt-3 d-flex flex-column">
    <div class="sidebar-title font-weight-bold h5">Loại sản phẩm</div>
    <?php      
      $loai_san_phams = execute_query("SELECT * FROM loai_san_pham");      
      foreach($loai_san_phams as $loai_san_pham)
        echo "<a href='gioi_thieu_san_pham_theo_loai_san_pham.php?id={$loai_san_pham['ma_loai_san_pham']}'><div class='text-dark font-weight-bold mb-1'>{$loai_san_pham['ten_loai_san_pham']}</div></a>";
    ?>
  </div>
  <div class="container-md">
    <div class="row">
      <?php        
        $ma_loai_san_pham = (int)$_GET['id'];     
        $params = array('ma_loai_san_pham' => $ma_loai_san_pham);
        $loai_san_phams = execute_query("SELECT * FROM loai_san_pham WHERE ma_loai_san_pham=:ma_loai_san_pham", $params);        
        if(count($loai_san_phams) == 0){
          alert("Nhà sản xuất không tồn tại");
          location("gioi_thieu_san_pham_theo_nha_san_xuat.php?id={$nha_san_xuat['ma_loai_san_pham']}");
        }else
          $loai_san_pham = $loai_san_phams[0];        
        echo "<div class='col-lg-12 h4 p-3 mt-3 font-weight-bold text-uppercase title'>{$loai_san_pham['ten_loai_san_pham']}</div>";      
        $sql = "SELECT * FROM v_san_pham WHERE ma_loai_san_pham=:ma_loai_san_pham";
        $page_index = 1;
        $page_length = 20;
        if(isset($_GET['pid']))
          $page_index = $_GET['pid'];
        $page_start = ($page_index - 1) * $page_length;
        $sql .= " LIMIT {$page_start}, {$page_length}";
        $san_phams = execute_query($sql, $params);
        foreach($san_phams as $san_pham)
          echo "<div class='col-md-3'>
            <div class='product-container text-center overflow-hidden p-3 my-3'>
              <a href='/web_ban_hang/home/trinh_bay_san_pham.php?id={$san_pham['ma_san_pham']}'><img class='product-img' style='width: 200px;' src='../data/san_pham/{$san_pham['hinh_anh']}'></a>
              <div class='font-weight-bold h6 mt-3'>{$san_pham['ten_san_pham']}</div>
              <div class='text-danger'>Giá: {$san_pham['gia_khuyen_mai']}&#8363 <span class='text-dark' style='text-decoration-line: line-through; font-size: 15px;'>{$san_pham['gia']}&#8363</span></div>
              <div class='text-info'>{$san_pham['luot_xem']} Lượt xem</div>
            </div>
          </div>";
      ?>
      <div class="col-md-12">
        <div class="pagination d-flex justify-content-center">
          <ul class="pagination">
            <?php
              $row_number = execute_query("SELECT COUNT(*) AS dem FROM san_pham WHERE ma_loai_san_pham=:ma_loai_san_pham AND trang_thai=1", $params)[0]['dem'];
              $page_number = (int) $row_number / $page_length;
              if($row_number % $page_length != 0)
                $page_number++;
              for($i = 1; $i <= $page_number; $i++)
                echo "<li class='page-item'>
                  <a href='/web_ban_hang/home/gioi_thieu_san_pham_theo_loai_san_pham.php?id={$ma_loai_san_pham}&pid={$i}' class='page-link'>{$i}</a>
                </li>";
            ?>
          </ul>
        </div>
      </div>
    </div>    
  </div>
</div>