<?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

if(isset($_SESSION['user'])){
	echo "<script>location.href='app/includ/page/home.php'</script>";
}

?>
<div class="container py-5">
	<div class="row">
		<div class="col-12 col-md-3"></div>	
		<div class="col-12 col-md-6 rounded">
			<div class="border border-info py-5 container text-center">
				<center><div style="width: 70%">


					<h4 class="text-center text-uppercase mb-4 text-info">Đăng ký</h4>
					<form action method="POST" class="">
						<input type="text" name="taikhoan" class="form-control mb-3" placeholder="Nhập tài khoản">
						<input type="password" name="matkhau" class="form-control mb-3" placeholder="Nhập mật khẩu">
						<input type="password" name="matkhau2" class="form-control mb-3" placeholder="Nhập lại mật khẩu">
						<button class="btn btn-info" type="submit" name="dangky" style="width: 100%">Đăng ký</button>
					</form>

					<?php
					if(isset($_POST['dangky'])){
						if( !empty($_POST['taikhoan']) && !empty($_POST['matkhau']) && !empty($_POST['matkhau2']) ){
							$taikhoan = ansuzhi_format($_POST['taikhoan']);
							$matkhau = ansuzhi_format($_POST['matkhau']);
							$matkhau2 = ansuzhi_format($_POST['matkhau2']);


								//kiểm tra tài khoản đã tồn tại chưa
							$kiemtra = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user WHERE taikhoan = '$taikhoan'"));
							if($kiemtra <= 0){
									//nếu chưa tồn tại

								//kiểm tra pass khớp chưa
								if($matkhau == $matkhau2){
									//khớp rồi

									$save = mysqli_query($connect,
									"INSERT INTO `user` (`id`, `taikhoan`, `matkhau`, `tien`, `chucvu`, `time`) VALUES (NULL, '$taikhoan', '$matkhau', '0', '1', '$time')");

									if($save){
										?>
										<script type="text/javascript">
											swal("Thông báo", "Đăng ký thành công!", "success");
										</script>
										<meta http-equiv="refresh" content="1">
										<?php
										$_SESSION['user'] = $taikhoan;
									} else {
										?>
										<script type="text/javascript">
											swal("Thông báo", "Có lỗi xãy ra", "error");
										</script>
										<meta http-equiv="refresh" content="1">
										<?php
									}

								} else {
									//không khớp
									?>
									<script type="text/javascript">
										swal("Thông báo", "Mật khẩu bạn nhập không khớp nhau!", "error");
									</script>
									<meta http-equiv="refresh" content="1">
									<?php
								}

							} else {
									//nếu tồn tại rồi
								?>
								<script type="text/javascript">
									swal("Thông báo", "Tài khoản đã tồn tại!", "error");
								</script>
								<meta http-equiv="refresh" content="1">
								<?php
							}


								//echo $taikhoan;
						} else {
							?>
							<script type="text/javascript">
								swal("Thông báo", "Vui lòng nhập đầy đủ thông tin!", "error");
							</script>
							<meta http-equiv="refresh" content="1">
							<?php
						}
					}
					?>

				</div></center>
			</div>
		</div>	
		<div class="col-12 col-md-3"></div>		
	</div>
</div>

<?php
require_once __DIR__."/../../theme/footer.php";
?>