<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý tin tức</title>
	<?php
		include '../module/head.php';
	?>
</head>
<body>
	<div class="container-fluid px-0">
		<?php
		include '../module/menu.php';?>
    <div id="main" class="row no-gutters p-3">
      <?php 
        include '../module/header.php'; 
        include '../module/form_tin_tuc/form_quan_ly_tin_tuc.php'; 
        include '../module/table/table_tin_tuc.php';  
        include '../module/menu_function.php';
      ?>
    </div>
	</div>
</body>
</html>