<!DOCTYPE html>
<html>
<head>
	<title>Thêm loại tin tức</title>
	<?php 
    include '../module/head.php'; 
  ?>
</head>
<body>
  <div class="container-fluid px-0">
    <?php 
      include '../module/menu.php';
    ?>
    <form onsubmit="return check_form();" action="xu_ly_them_loai_tin_tuc.php" method="post" id="main" class="row no-gutters p-3">
			<?php 
				include '../module/header.php';
			 	include '../module/form_loai_tin_tuc/form_them_loai_tin_tuc.php';
			 	include '../module/table/table_loai_tin_tuc.php'; 
        include '../module/menu_function.php';
			?>
		</form>
  </div>
</body>
</html>