<?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

if(isset($_SESSION['user'])){
	echo "<script>location.href='/sharecode'</script>";
}

?>
<div class="container py-5">
	<div class="row">
		<div class="col-12 col-md-3"></div>	
		<div class="col-12 col-md-6 rounded">
			<div class="border border-info py-5 container text-center">
				<center><div style="width: 70%">


					<h4 class="text-center text-uppercase mb-4 text-info">Đăng nhập</h4>
					<form action method="POST" class="">
						<input type="text" name="taikhoan" class="form-control mb-3" placeholder="Nhập tài khoản">
						<input type="password" name="matkhau" class="form-control mb-3" placeholder="Nhập mật khẩu">
						<button class="btn btn-info" type="submit" name="dangnhap" style="width: 100%">Đăng nhập</button>
					</form>
					
					<?php
					if(isset($_POST['dangnhap'])){
						if( !empty($_POST['taikhoan']) && !empty($_POST['matkhau']) ){
							$taikhoan = ansuzhi_format($_POST['taikhoan']);
							$matkhau = ansuzhi_format($_POST['matkhau']);
							$kiemtra = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'"));
							if($kiemtra >= 1){
								?>
								<script type="text/javascript">
									swal("Thông báo", "Đăng nhập thành công!", "success");
								</script>
								<meta http-equiv="refresh" content="1">
								<?php
								$_SESSION['user'] = $taikhoan;
							} else {
								?>
								<script type="text/javascript">
									swal("Thông báo", "Sai tài khoản hoặc mật khẩu!", "error");
								</script>
								<meta http-equiv="refresh" content="1">
								<?php
							}
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