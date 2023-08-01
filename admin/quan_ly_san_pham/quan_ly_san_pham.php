<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lý thông tin sản phẩm</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
    include '../module/head.php';
  ?>
</head>
<body>
	<div class="container-fluid px-0">
		<?php
      include '../module/menu.php';
    ?>
		<div id="main" class="row no-gutters p-3">
			<?php
        include '../module/header.php';
        include '../module/form_san_pham/form_quan_ly_san_pham.php';
        include '../module/table/table_san_pham.php';
        include '../module/menu_function.php';
      ?>						
		</div>
	</div>
</body>
</html>