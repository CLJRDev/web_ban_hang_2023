<div class="container-fluid">
  <div class="row" id="first-header">
    <div class="col-md-2 py-2 pl-3"><i class="bi bi-telephone-fill pr-1"></i> 0225.123.456</div>
    <div class="col-md-2 py-2 pl-3"><i class="bi bi-phone-fill pr-1"></i> 079.123.4567</div>
    <div class="col-md-2 py-2 pl-3"><i class="bi bi-envelope-fill pr-1"></i> website@gmail.com</div>
    <div class="col-md-6 py-2 px-3"> 
      <form action="/web_ban_hang/home/xu_ly_tim_kiem_tu_khoa.php" class="input-group-sm input-group">
        <input name="tu_khoa" type="text" class="form-control my-0 mr-0" placeholder="Từ khóa">
        <div class="input-group-append">
          <button class="btn btn-sm btn-danger my-0">Tìm kiếm <i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12" id="second-header">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand"><img src="../img/home/logo.png" style="height: 65px"></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menu" aria-expanded="false">
      <i class="bi bi-list text-color-2"></i>
      </button>
      <div class="navbar-collapse collapse" id="menu">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item px-3"><a href="trang_chu.php" class="nav-link"><i class="bi bi-house-door-fill"></i> Trang chủ</a></li>
        <li class="nav-item px-3"><a href="#" class="nav-link"><i class="bi bi-people-fill"></i> Giới thiệu</a></li>
        <li class="nav-item px-3 dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="bi bi-box-fill"></i> Loại sản phẩm</a>
        <div class="dropdown-menu">
          <?php
            $loai_san_phams = execute_query("SELECT * FROM loai_san_pham");
            foreach($loai_san_phams as $loai_san_pham)
            echo "<a href='/web_ban_hang/home/gioi_thieu_san_pham_theo_loai_san_pham.php?id={$loai_san_pham['ma_loai_san_pham']}' class='dropdown-item'>{$loai_san_pham['ten_loai_san_pham']}</a>";
          ?>
        </div>
        </li>
        <li class="nav-item px-3 dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="bi bi-collection-fill"></i> Nhà sản xuất</a>
        <div class="dropdown-menu">
          <?php
            $nha_san_xuats = execute_query("SELECT * FROM nha_san_xuat");
            foreach($nha_san_xuats as $nha_san_xuat)
              echo "<a href='/web_ban_hang/home/gioi_thieu_san_pham_theo_nha_san_xuat.php?id={$nha_san_xuat['ma_nha_san_xuat']}' class='dropdown-item'>{$nha_san_xuat['ten_nha_san_xuat']}</a>";
          ?>          
        </div>
        </li>
        <li class="nav-item px-3"><a href="/web_ban_hang/home/gioi_thieu_tat_ca_tin_tuc.php" class="nav-link"><i class="bi bi-newspaper"></i> Tin tức</a></li>
        <li class="nav-item px-3"><a class="nav-link"><i class="bi bi-envelope-fill pr-2"></i> Thông tin liên hệ</a></li>
      </ul>
      </div>
    </nav>
    </div>
  </div>
</div>