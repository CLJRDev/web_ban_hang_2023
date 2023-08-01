<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<?php
		include '../module/head.php';
	?>
</head>
<body style="background-image: linear-gradient(to top left, #eed, #edd);">
	<div class="container">
		<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
			<div class="col-md-4">
				<h3 class="mb-4 text-center">ĐĂNG NHẬP</h3>
				<form action="xu_ly_dang_nhap.php" method="post">
					<div class="form-group">
						<input type="text" class="form-control" id="ten_tai_khoan_dang_nhap" name="ten_tai_khoan" placeholder="Tên tài khoản" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="mat_khau_dang_nhap" name="mat_khau" placeholder="Mật khẩu" required>
						<span toggle="#mat_khau_dang_nhap" class="bi bi-eye field-icon toggle-password"></span>
					</div>
					<div class="form-group text-center">
						<button class="btn btn-md font-weight-bold">Đăng Nhập</button>
					</div>
				</form>
				<div class="mt-3 text-center">
					<a href="#">Quên mật khẩu?</a>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$(".toggle-password").click(function(){
				$(this).toggleClass("bi-eye bi-eye-slash");
				var input = $($(this).attr("toggle"));
				if(input.attr("type") == "password"){
					input.attr("type", "text");
				} else {
					input.attr("type", "password");
				}
			});
		});
	</script>
</body>
</html>