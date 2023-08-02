<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm nhà sản xuất</title>
	<?php
		include '../module/head.php';
	?>
</head>
<body>
	<div class="container-fluid px-0">
		<?php
		include '../module/menu.php';?>
		<form onsubmit="return check_form();" action="xu_ly_them_nha_san_xuat.php" method="post" enctype="multipart/form-data">
			<div id="main" class="row no-gutters p-3">
				<?php 
					include '../module/header.php'; 
					include '../module/form_nha_san_xuat/form_them_nha_san_xuat.php'; 
					include '../module/table/table_nha_san_xuat.php';       
          include '../module/menu_function.php';     
				?>
			</div>
		</form>
	</div>
</body>
</html>