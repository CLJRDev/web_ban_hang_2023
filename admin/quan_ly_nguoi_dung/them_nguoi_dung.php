<!DOCTYPE html>
<html>
<head>
	<title>Thêm người dùng</title>
	<?php
		include '../module/head.php';
	?>
</head>
<body>
	<div class="container-fluid px-0">
		<?php
			include '../module/menu.php';
		?>
		<form action="xu_ly_them_nguoi_dung.php" onsubmit="return check_form();" method="post" id="main" class="row no-gutters p-3">
			<?php
				include '../module/header.php';
				include '../module/form_nguoi_dung/form_them_nguoi_dung.php';
				include '../module/table/table_nguoi_dung.php';
				include '../module/menu_function.php';
			?>
		</form>
	</div>
</body>
</html>