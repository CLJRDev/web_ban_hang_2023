<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sửa loại sản phẩm</title>
	<?php
    include '../module/head.php';   
  ?>
</head>
<body>
	<div class="container-fluid px-0">
		<?php
      include '../module/menu.php';      
    ?>
    <form onsubmit="return check_form();" action="xu_ly_sua_loai_san_pham.php" method="post" enctype="multipart/form-data">
      <div id="main" class="row no-gutters p-3">
        <?php
          include '../module/header.php';
          include '../module/form_loai_san_pham/form_sua_loai_san_pham.php';
          include '../module/table/table_loai_san_pham.php';
          include '../module/menu_function.php';
        ?>						
      </div>
    </form>
	</div>
</body>
</html>