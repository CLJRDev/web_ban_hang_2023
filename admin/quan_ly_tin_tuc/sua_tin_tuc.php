<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cập nhật tin tức</title>
	<?php
		include '../module/head.php';
	?>
</head>
<body>
	<div class="container-fluid px-0">
		<?php
		include '../module/menu.php';?>
		<form onsubmit="return check_form();" action="xu_ly_sua_tin_tuc.php" method="post" enctype="multipart/form-data">
			<div id="main" class="row no-gutters p-3">
				<?php 
					include '../module/header.php'; 
					include '../module/form_tin_tuc/form_sua_tin_tuc.php'; 
					include '../module/menu_function.php';
				?>
			</div>
		</form>
	</div>
</body>
</html>