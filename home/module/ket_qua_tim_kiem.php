<div class="container-md">
  <div class="row">
    <div class='col-lg-12 h5 p-3 mt-3 font-weight-bold text-uppercase title'>Kết quả tìm kiếm</div>
    <?php      
      $page_index = 1;
      $page_length = 2;
      if(isset($_GET['pid']))
        $page_index = $_GET['pid'];
      $page_start = ($page_index - 1) * $page_length; 
      $tu_khoa = 'helloo';
      if(isset($_SESSION['tu_khoa']))      
        $tu_khoa = $_SESSION['tu_khoa'];
      $sql = "SELECT * FROM v_san_pham WHERE CONCAT(ten_san_pham,mo_ta,ten_loai_san_pham,ten_nha_san_xuat) LIKE CONCAT('%',:tu_khoa,'%') LIMIT {$page_start}, {$page_length}";
      $san_phams = execute_query($sql, array('tu_khoa' => $tu_khoa));
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
            $row_number = execute_query("SELECT COUNT(*) AS dem FROM v_san_pham WHERE trang_thai=1 AND CONCAT(ten_san_pham,mo_ta,ten_loai_san_pham,ten_nha_san_xuat) LIKE CONCAT('%',:tu_khoa,'%')", array('tu_khoa' => $tu_khoa))[0]['dem'];
            $page_number = (int) $row_number / $page_length;
            if($row_number % $page_length != 0)
              $page_number++;
            for($i = 1; $i <= $page_number; $i++)
              echo "<li class='page-item'>
                <a href='/web_ban_hang/home/ket_qua_tim_kiem.php?pid={$i}' class='page-link'>{$i}</a>
              </li>";
          ?>
        </ul>
      </div>
    </div>
  </div>    
</div>