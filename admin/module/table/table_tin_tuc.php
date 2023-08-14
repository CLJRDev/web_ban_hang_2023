<div class="col-md-12 overflow-auto">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center" style="width: 75px;min-width: 75px"><i class="bi bi-key-fill"></i> Mã</th>
                <th style="min-width: 250px">Tiêu đề tin tức</th>
                <th class="text-center" style="width: 200px;min-width: 120px">Loại tin tức</th>
                <th class="text-center" style="width: 120px;min-width: 120px">Ngày đăng</th>
                <th class="text-center" style="width: 120px;min-width: 120px">Trạng thái</th>
                <th class="text-center" style="width: 120px;min-width: 120px">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT ma_tin_tuc, tieu_de, ten_loai_tin_tuc, ngay_dang, tin_tuc.trang_thai FROM tin_tuc 
                INNER JOIN loai_tin_tuc ON tin_tuc.ma_loai_tin_tuc = loai_tin_tuc.ma_loai_tin_tuc WHERE 1=1";

                $params = array();
                if(isset($_SESSION['tu_khoa_tin_tuc']))
                  if(isset($_SESSION['tu_khoa_tin_tuc']) != ''){
                    $sql = $sql . " AND CONCAT(tieu_de,tom_tat,noi_dung) LIKE CONCAT('%',:tu_khoa,'%')";
                    $params['tu_khoa'] = $_SESSION['tu_khoa_tin_tuc'];
                  }
                if(isset($_SESSION['tu_ngay_tin_tuc']))
                  if($_SESSION['tu_ngay_tin_tuc'] != '' ){
                    $sql = $sql . " AND ngay_dang >= :tu_ngay";
                    $params['tu_ngay'] = $_SESSION['tu_ngay_tin_tuc'];
                  }
                if(isset($_SESSION['den_ngay_tin_tuc']))
                  if($_SESSION['den_ngay_tin_tuc'] != ''){
                    $sql = $sql . " AND ngay_dang <= :den_ngay";
                    $params['den_ngay'] = $_SESSION['den_ngay_tin_tuc'];
                  }
                if(isset($_SESSION['ma_loai_tin_tuc']))
                  if($_SESSION['ma_loai_tin_tuc'] != -1){
                    $sql = $sql . " AND tin_tuc.ma_loai_tin_tuc = :ma_loai_tin_tuc";
                    $params['ma_loai_tin_tuc'] = $_SESSION['ma_loai_tin_tuc'];
                  }
                if(isset($_SESSION['trang_thai_tin_tuc']))
                  if($_SESSION['trang_thai_tin_tuc'] != -1){
                    $sql = $sql . " AND tin_tuc.trang_thai = :trang_thai";
                    $params['trang_thai'] = $_SESSION['trang_thai_tin_tuc'];
                  }
                $page_index = 1;
                $page_length = 10;
                if(isset($_GET['pid']))
                  $page_index = $_GET['pid'];
                $page_start = ($page_index - 1) * $page_length;
                $sql .= " LIMIT {$page_start}, {$page_length}";
                $tin_tucs = execute_query($sql, $params);
                foreach($tin_tucs as $tin_tuc)                 
                  echo '<tr>
                      <td class="text-center">'. $tin_tuc['ma_tin_tuc'].'</td>
                      <td>'. $tin_tuc['tieu_de'].'</td>
                      <td class="text-center">'.$tin_tuc['ten_loai_tin_tuc'].'</td>
                      <td class="text-center">'. format_date_vn($tin_tuc['ngay_dang']).'</td>
                      <td class="text-center">
                          <input type="checkbox" onclick="return false" '.($tin_tuc['trang_thai'] == 1 ? 'checked' : '').'>
                      </td>
                      <td class="text-center">
                        <a href="sua_tin_tuc.php?id='.$tin_tuc['ma_tin_tuc'].'"><i class="bi bi-pen-fill"></i></a> | 
                        <a href="xu_ly_xoa_tin_tuc.php?id='.$tin_tuc['ma_tin_tuc'].'"><i class="bi bi-trash-fill"></i></a>
                      </td>
                  </tr>';                
            ?>
        </tbody>
    </table>
</div>
<div class="col-md-12">
  <div class="pagination d-flex justify-content-center">
    <ul class="pagination">
      <?php
        $row_number = execute_query("SELECT COUNT(*) AS dem FROM tin_tuc")[0]['dem'];
        $page_number = (int) $row_number / $page_length;
        if($row_number % $page_length != 0)
          $page_number++;
        for($i = 1; $i <= $page_number; $i++)
          echo "<li class='page-item'>
            <a href='/web_ban_hang/admin/quan_ly_tin_tuc/quan_ly_tin_tuc.php?pid={$i}' class='page-link'>{$i}</a>
          </li>";
      ?>
    </ul>
  </div>
</div>