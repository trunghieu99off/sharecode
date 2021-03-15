 <?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

if(!isset($_SESSION['user'])){
	header('location: /sharecode');
}

?>

<div class="py-4"></div>
<div class="container mb-5">
	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<div class="container text-center py-5 border border-info">
				<h2 class="mb-4 text-uppercase font-weight-light text-info">ĐỔI MẬT KHẨU</h2>

				<center>

					<div style="width: 80%">
						<form action method="POST">
							<input type="password" name="matkhau" class="form-control mb-4" placeholder="Mật khẩu củ">
							<input type="password" name="newmatkhau" class="form-control mb-4" placeholder="Mật khẩu mới">
							<input type="password" name="newmatkhau2" class="form-control mb-4" placeholder="Nhập lại mật khẩu mới">
							<button type="submit" name="doimatkhau_submit" class="btn btn-info" style="width: 100%">Đổi mật khẩu</button>
						</form>
					</div>

				</center>

			</div>
		</div>

		<div class="col-md-3"></div>
	</div>
</div>

<?php
if(isset($_POST['doimatkhau_submit'])){
	?>
	<meta http-equiv="refresh" content="1;url=">
	<?php
	$matkhau = ansuzhi_format($_POST['matkhau']);
	$newmatkhau = ansuzhi_format($_POST['newmatkhau']);
	$newmatkhau2 = ansuzhi_format($_POST['newmatkhau2']);


	$taikhoantam = $user['taikhoan'];
	$result = mysqli_query($connect, "SELECT * FROM user WHERE taikhoan = '$taikhoantam' AND matkhau = '$matkhau'");
	if(mysqli_num_rows($result) >= 1){
		if($newmatkhau == $newmatkhau2 ){
			$check = mysqli_query($connect, "UPDATE user SET matkhau = '$newmatkhau' WHERE taikhoan = '$taikhoantam'");
			if($check){
				echo '<script>swal("Thông báo", "Đổi mật khẩu thành công", "success");</script>';
				unset($_SESSION['user']);
				?>
				<meta http-equiv="refresh" content="1">
				<?php
			} else {
				echo '<script>swal("Thông báo", "Có lỗi xảy ra!", "error");</script>';
			}
		} else {
			echo '<script>swal("Thông báo", "Nhập lại mật khẩu mới không khớp!", "error");</script>';
		}
	} else {
		echo '<script>swal("Thông báo", "Mật khẩu củ không đúng", "error");</script>';
	}


}
?>

<?php
require_once __DIR__."/../../theme/footer.php";
?>