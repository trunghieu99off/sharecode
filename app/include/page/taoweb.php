<?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";
$loai = (int)$get_data[0];


if( mysqli_num_rows(mysqli_query($connect, "SELECT * FROM danhsachcode WHERE id = '$loai'")) < 1 ){
	header('location: /');
}

$info_donhang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM danhsachcode WHERE id = '$loai' LIMIT 1"));


?>

<div class="container py-5">
	<div class="row">

		<div class="col-12 col-md-6 mb-3">
			<div class="border border-info container py-3 rounded">

				<h3 class="text-uppercase py-3 text-info">Tạo Trang Web</h3>

				<form action method="POST">
					<input type="text" name="taikhoan" class="form-control mb-3" placeholder="Nhập tài khoản (Admin)">
					<input type="password" name="matkhau" class="form-control mb-3" placeholder="Nhập mật khẩu (Admin)">
					<input type="text" name="domain" class="form-control mb-3" placeholder="Nhập tên miền">

					<select class="form-control mb-3" name="thanhtoan">
						<option value="">Thanh toán:</option>
						<option value="1">1 Tháng</option>
						<option value="2">3 Tháng</option>
						<option value="3">6 Tháng</option>
						<option value="4">12 Tháng</option>
						<option value="5">24 Tháng</option>
						<option value="6">36 Tháng</option>
					</select>

					<input type="text" name="magiamgia" class="form-control mb-3" placeholder="Nhập mã giảm giá (Nếu có)">
					<input type="hidden" name="opt" value="taoweb">
					<button class="btn btn-info" name="tao" type="submit" style="width: 100%">Tạo ngay</button>

				</form>

				<?php
				if(isset($_POST['tao'])){
					echo '<meta http-equiv="refresh" content="1;url=">';
					if(isset($_SESSION['user'])){
						
						if( !empty($_POST['taikhoan']) && !empty($_POST['matkhau']) && !empty($_POST['domain']) && !empty($_POST['thanhtoan']) ){

							$thanhtoans = [
								'1' => 1,
								'2' => 3,
								'3' => 6,
								'4' => 12,
								'5' => 24,
								'6' => 36,
							];

							$taikhoan = ansuzhi_format($_POST['taikhoan']);
							$matkhau = ansuzhi_format($_POST['matkhau']);
							$domain = ansuzhi_format($_POST['domain']);
							$tt = ansuzhi_format($_POST['thanhtoan']);



							if(isset($thanhtoans[$tt])){
								$thanhtoan = $thanhtoans[$tt];
								$giamgia = 0;

								if(isset($_POST['magiamgia'])){
									$magiamgia = $_POST['magiamgia'];
									$check_giam_gia = mysqli_query($connect, "SELECT * FROM magiamgia WHERE magiamgia = '$magiamgia' AND loai = 'taoweb' AND trangthai = 'true'");

									if(mysqli_num_rows($check_giam_gia) >= 1){
										$info_giamgia = mysqli_fetch_assoc($check_giam_gia);
										$giamgia = $info_giamgia['phantram_giamgia'];
									}

									$tienphaitra = ($info_donhang['gia'] * $thanhtoan) - ($info_donhang['gia'] * $thanhtoan / 100 * $giamgia);


									if($user['tien'] >= $tienphaitra){
										if(!empty($_POST['magiamgia'])){



											if(mysqli_num_rows($check_giam_gia) >= 1){
												if($info_giamgia['luotdung'] <= 1){
													mysqli_query($connect, "UPDATE magiamgia SET trangthai = 'false', luotdung = '0' WHERE id = '".$info_giamgia['id']."'");
												} else {
													mysqli_query($connect, "UPDATE magiamgia SET luotdung = luotdung - 1 WHERE id = '".$info_giamgia['id']."'");
												}

												mysqli_query($connect, "UPDATE user SET tien = tien - $tienphaitra WHERE id = '".$user['id']."'");
												mysqli_query($connect, "INSERT INTO `taoweb` (`id`, `uid`, `domain`, `id_code`, `time1`, `time2`, `thanhtoan`, `taikhoanadmin`, `matkhauadmin`, `trangthai`) VALUES (NULL, '".$user['id']."', '$domain', '$loai', '".time()."', '$time', '$thanhtoan', '$taikhoan', '$matkhau', '0')");

												$err = 'Tạo website thành công!';
												echo '<script>swal("Thông báo", "'.$err.'", "success");</script>';

											} else {
												
												$err = 'Mã giảm giá không đúng!';
												echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';
											}



										} else {

											mysqli_query($connect, "UPDATE user SET tien = tien - $tienphaitra WHERE id = '".$user['id']."'");
											mysqli_query($connect, "INSERT INTO `taoweb` (`id`, `uid`, `domain`, `id_code`, `time1`, `time2`, `thanhtoan`, `taikhoanadmin`, `matkhauadmin`, `trangthai`) VALUES (NULL, '".$user['id']."', '$domain', '$loai', '".time()."', '$time', '$thanhtoan', '$taikhoan', '$matkhau', '0')");

											$err = 'Tạo website thành công!';
											echo '<script>swal("Thông báo", "'.$err.'", "success");</script>';

										}

									} else {
										$err = 'Bạn không đủ tiền!';
										echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';
									}

								}





							} 


						} else {

							$err = 'Vui lòng nhập đầy đủ thông tin!';
							echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';

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
					<li>Giá tiền: <?php echo number_format($info_donhang['gia']).'đ/1 Tháng'; ?></li>
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