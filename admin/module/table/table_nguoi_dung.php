<div class="col-md-12 overflow-auto">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th style="min-width: 325px">Tên tài khoản</th>
				<th style="min-width: 120px; width: 120px; text-align: center;">Trạng thái</th>
				<th style="min-width: 120px; width: 120px; text-align: center;">Hành động</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$nguoi_dungs = execute_query("SELECT * FROM nguoi_dung");
				foreach ($nguoi_dungs as $nguoi_dung) {
					echo '<tr>
						<td>'.$nguoi_dung[0].'</td>
						<td class="text-center">
							<input type="checkbox" onclick="return false;" '.($nguoi_dung[2] == 1 ? 'checked' : 'unchecked').'></input>
						</td>
						<td class="text-center">
							<a href="sua_nguoi_dung.php?id='.$nguoi_dung[0].'"><i class="bi bi-pen-fill"></i></a> | 
							<a href="xu_ly_xoa_nguoi_dung.php?id='.$nguoi_dung[0].'"><i class="bi bi-trash-fill"></i></a>
						</td>
					</tr>';
				}
			?>
		</tbody>
	</table>
</div>