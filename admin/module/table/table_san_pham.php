<div class="col-md-12 overflow-auto">
  <table class="table table-striped table-bordered">
    <thead class="text-center">
      <tr>
        <th class="text-right" style="width: 75px;min-width: 75px"><i class="bi bi-key-fill"></i> Mã</th>
        <th style="min-width: 250px">Tên sản phẩm</th>
        <th style="width: 200px;min-width: 150px">Loại sản phẩm</th>
        <th style="width: 200px; min-width: 150px">Nhà sản xuất</th>
        <th style="width: 120px;min-width: 120px">Giá</th>
        <th style="width: 120px;min-width: 120px">Trạng thái</th>
        <th style="width: 120px;min-width: 120px">Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM v_san_pham WHERE 1=1";
        $params = array();
        if(isset($_SESSION['tu_khoa_san_pham']))
          if($_SESSION['tu_khoa_san_pham'] != ''){
            $sql .= " AND CONCAT(ten_san_pham,mo_ta) LIKE CONCAT('%',:tu_khoa,'%')";
            $params['tu_khoa'] = $_SESSION['tu_khoa_san_pham'];
          }
        if(isset($_SESSION['ma_loai_san_pham']))
          if($_SESSION['ma_loai_san_pham'] != -1){
            $sql .= " AND san_pham.ma_loai_san_pham = :ma_loai_san_pham";
            $params['ma_loai_san_pham'] = $_SESSION['ma_loai_san_pham'];
          }
        if(isset($_SESSION['ma_nha_san_xuat']))
          if($_SESSION['ma_nha_san_xuat'] != -1){
            $sql .= " AND san_pham.ma_nha_san_xuat = :ma_nha_san_xuat";
            $params['ma_nha_san_xuat'] = $_SESSION['ma_nha_san_xuat'];
          }
        if(isset($_SESSION['tu_gia']))
          if($_SESSION['tu_gia'] != ''){
            $sql .= " AND gia_khuyen_mai >= :tu_gia";
            $params['tu_gia'] = $_SESSION['tu_gia'];
          }        
        if(isset($_SESSION['den_gia']))
          if($_SESSION['den_gia'] != ''){
            $sql .= " AND gia_khuyen_mai <= :den_gia";
            $params['den_gia'] = $_SESSION['den_gia'];
          }
        if(isset($_SESSION['trang_thai_san_pham']))
          if($_SESSION['trang_thai_san_pham'] != -1){
            $sql .= " AND san_pham.trang_thai = :trang_thai";
            $params['trang_thai'] = $_SESSION['trang_thai_san_pham'];
          }
        $page_index = 1;
        $page_length = 10;
        if(isset($_GET['pid']))
          $page_index = $_GET['pid'];
        $start_index = ($page_index - 1) * $page_length;
        $sql = $sql." LIMIT {$start_index}, {$page_length}";
        $san_phams = execute_query($sql, $params);        
        foreach($san_phams as $san_pham){        
          echo "<tr>
            <td class='text-center'>{$san_pham['ma_san_pham']}</td>
            <td>{$san_pham['ten_san_pham']}</td>
            <td>{$san_pham['ten_loai_san_pham']}</td>
            <td>{$san_pham['ten_nha_san_xuat']}</td>
            <td>{$san_pham['gia_khuyen_mai']}</td>
            <td class='text-center'><input onclick='return false;' type='checkbox' " . ($san_pham['trang_thai'] == 1 ? 'checked' : '') . "></td>
            <td class='text-center'>
             <a href='sua_san_pham.php?id=".$san_pham['ma_san_pham']."'><i class='bi bi-pen-fill'></i></a> | 
             <a href='xu_ly_xoa_san_pham.php?id=".$san_pham['ma_san_pham']."'><i class='bi bi-trash-fill'></i></a>
            </td>
          </tr>";
        }              
      ?>                  
    </tbody>
  </table>
</div>
<div class="col-md-12">
  <div class="pagination d-flex justify-content-center">
    <ul class="pagination">
      <?php
        $row_number = execute_query("SELECT COUNT(*) AS dem FROM san_pham")[0]['dem'];
        $page_number = (int) $row_number / $page_length;
        if($row_number % $page_length != 0)
          $page_number++;
        for($i = 1; $i <= $page_number; $i++)
          echo "<li class='page-item'>
            <a href='/web_ban_hang/admin/quan_ly_san_pham/quan_ly_san_pham.php?pid={$i}' class='page-link'>{$i}</a>
          </li>";
      ?>
    </ul>
  </div>
</div>