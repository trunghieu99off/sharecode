<?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";
$loai = (int)$get_data[0];


if( mysqli_num_rows(mysqli_query($connect, "SELECT * FROM danhsachcode1 WHERE id = '$loai'")) < 1 ){
	header('location: /');
}

$info_donhang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM danhsachcode1 WHERE id = '$loai' LIMIT 1"));


?>

<div class="container py-5">
	<div class="row">

		<div class="col-12 col-md-6 mb-3">
			<div class="border border-info container py-3 rounded">

				<h3 class="text-uppercase py-3 text-info">Mua Source</h3>

				<form action method="POST">
					<input type="text" name="magiamgia" class="form-control mb-3" placeholder="Nhập mã giảm giá (Nếu có)">
					<input type="hidden" name="opt" value="muasourcecode">
					<button class="btn btn-info" name="tao" type="submit" style="width: 100%">Tạo ngay</button>

				</form>

				<?php
				if(isset($_POST['tao'])){
					echo '<meta http-equiv="refresh" content="1;url=">';					

					if(isset($_SESSION['user'])){
						$giamgia = 0;

						if(isset($_POST['magiamgia'])){
							$magiamgia = $_POST['magiamgia'];
							$check_giam_gia = mysqli_query($connect, "SELECT * FROM magiamgia WHERE magiamgia = '$magiamgia' AND loai = 'muasourcecode' AND trangthai = 'true'");

							if(mysqli_num_rows($check_giam_gia) >= 1){
								$info_giamgia = mysqli_fetch_assoc($check_giam_gia);
								$giamgia = $info_giamgia['phantram_giamgia'];
							}

							$tienphaitra = $info_donhang['gia'] - ($info_donhang['gia'] / 100 * $giamgia);


							if($user['tien'] >= $tienphaitra){
								if(!empty($_POST['magiamgia'])){
									if(mysqli_num_rows($check_giam_gia) >= 1){
										if($info_giamgia['luotdung'] <= 1){
											mysqli_query($connect, "UPDATE magiamgia SET trangthai = 'false', luotdung = '0' WHERE id = '".$info_giamgia['id']."'");
										} else {
											mysqli_query($connect, "UPDATE magiamgia SET luotdung = luotdung - 1 WHERE id = '".$info_giamgia['id']."'");
										}

										mysqli_query($connect, "UPDATE user SET tien = tien - $tienphaitra WHERE id = '".$user['id']."'");
										mysqli_query($connect, "INSERT INTO `lichsu_muasourcecode` (`id`, `uid`, `id_code`, `time`) VALUES (NULL, '".$user['id']."', '$loai', '$time')");

										$err = 'Mua source thành công!';
										echo '<script>swal("Thông báo", "'.$err.'", "success");</script>';


									} else {								


										$err = 'Mã giảm giá không đúng!';
										echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';


									}
								} else {
									mysqli_query($connect, "UPDATE user SET tien = tien - $tienphaitra WHERE id = '".$user['id']."'");
										mysqli_query($connect, "INSERT INTO `lichsu_muasourcecode` (`id`, `uid`, `id_code`, `time`) VALUES (NULL, '".$user['id']."', '$loai', '$time')");

										$err = 'Mua Code thành công!';
										echo '<script>swal("Thông báo", "'.$err.'", "success");</script>';
								}



							} else {
								$err = 'Bạn không đủ tiền!';
								echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';
							}


						}




					} else {
						$err = 'Đăng nhập để tiếp tục!';
						echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';
					}



				}
				?>



			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="border border-warning container py-3 rounded">
				<h3 class="text-uppercase py-3 text-warning">Info đơn hàng</h3>
				<ul>
					<li>Tên: <?php echo $info_donhang['ten']; ?></li>
					<li>Mô tả: <?php echo $info_donhang['mota']; ?></li>
					<li>Giá tiền: <?php echo number_format($info_donhang['gia']).'đ'; ?></li>
				</ul>
				<hr>

				<div class="row">
					<div class="col-12 col-md-6 mb-3">
						<img src="<?php echo $info_donhang['thumbnail']; ?>" class="img-thumbnail" style="width: 100%; height: 189px">
					</div>
					<div class="col-12 col-md-6">
						<a target="_bank" href="<?php echo $info_donhang['demo']; ?>">
							<button class="btn btn-warning" style="width: 100%">XEM DEMO</button>
						</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


<?php
require_once __DIR__."/../../theme/footer.php";
?>