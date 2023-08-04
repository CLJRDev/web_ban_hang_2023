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
        $sql = "SELECT ma_san_pham, ten_san_pham, ten_loai_san_pham, ten_nha_san_xuat, gia, san_pham.trang_thai FROM san_pham 
                INNER JOIN loai_san_pham ON san_pham.ma_loai_san_pham = loai_san_pham.ma_loai_san_pham 
                INNER JOIN nha_san_xuat ON san_pham.ma_nha_san_xuat = nha_san_xuat.ma_nha_san_xuat WHERE 1=1";
        $params = array();
        if(isset($_SESSION['tu_khoa_san_pham'])){
          $sql .= " AND CONCAT(ten_san_pham,mo_ta) LIKE CONCAT('%',:tu_khoa,'%')";
          $params['tu_khoa'] = $_SESSION['tu_khoa_san_pham'];
        }
        if(isset($_SESSION['ma_loai_san_pham']) && $_SESSION['ma_loai_san_pham'] != -1){
          $sql .= " AND san_pham.ma_loai_san_pham = :ma_loai_san_pham";
          $params['ma_loai_san_pham'] = $_SESSION['ma_loai_san_pham'];
        }
        if(isset($_SESSION['ma_nha_san_xuat']) && $_SESSION['ma_nha_san_xuat'] != -1){
          $sql .= " AND san_pham.ma_nha_san_xuat = :ma_nha_san_xuat";
          $params['ma_nha_san_xuat'] = $_SESSION['ma_nha_san_xuat'];
        }
        if(isset($_SESSION['tu_gia'])){
          $sql .= " AND gia >= :tu_gia";
          $params['tu_gia'] = $_SESSION['tu_gia'];
        }        
        if(isset($_SESSION['den_gia'])){
          $sql .= " AND gia <= :den_gia";
          $params['den_gia'] = $_SESSION['den_gia'];
        }
        if(isset($_SESSION['trang_thai_san_pham']) && $_SESSION['trang_thai_san_pham'] != -1){
          $sql .= " AND san_pham.trang_thai = :trang_thai";
          $params['trang_thai'] = $_SESSION['trang_thai_san_pham'];
        }
        $san_phams = execute_query($sql, $params);        
        foreach($san_phams as $san_pham){        
          echo "<tr>
            <td class='"."text-center"."'>{$san_pham['ma_san_pham']}</td>
            <td>{$san_pham['ten_san_pham']}</td>
            <td>{$san_pham['ten_loai_san_pham']}</td>
            <td>{$san_pham['ten_nha_san_xuat']}</td>
            <td>{$san_pham['gia']}</td>
        ";
          echo '
            <td class="text-center"><input onclick="return false;" type="checkbox" '.($san_pham['trang_thai'] == 1 ? 'checked' : '').'></td>
            <td class="text-center">
             <a href="sua_san_pham.php?id=' . $san_pham['ma_san_pham'] . '"><i class="bi bi-pen-fill"></i></a> | 
             <a href="xu_ly_xoa_san_pham.php?id=' . $san_pham['ma_san_pham'] . '"><i class="bi bi-trash-fill"></i></a>
            </td>
          </tr>';
        }              
      ?>            
    </tbody>
  </table>
</div>