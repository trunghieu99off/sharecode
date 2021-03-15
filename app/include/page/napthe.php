<?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

if(!isset($_SESSION['user'])){
	header('location: /');
}

?>

<div class="py-3"></div>
<div class="container">
	<div class="row">
		

		<div class="col-md-4 mb-4 col-12">
			<div class="text-center py-5">
				

				<center>

					<div style="width: 100%">
						<form action method="POST">
							<h2 class="text-dark mb-4 text-uppercase font-weight-light">NẠP TIỀN</h2>

							<select class="form-control mb-3" name="loaithe">
								<option value="">-- Chọn loại thẻ --</option>
								<option value="VIETTEL">Viettel</option>
								<option value="MOBIFONE">Mobifone</option>
								<option value="VINAPHONE">Vinaphone</option>
								<option value="VNMOBI">Vietnammobi</option>
								<option value="GATE">Gate</option>
								<option value="ZING">Zing</option>
							</select>
							<select class="form-control mb-3" name="menhgia">
								<option value="">-- Chọn mệnh giá --</option>
								<option value="10000">10,000đ</option>
								<option value="20000">20,000đ</option>
								<option value="30000">30,000đ</option>
								<option value="50000">50,000đ</option>
								<option value="100000">100,000đ</option>
								<option value="200000">200,000đ</option>
								<option value="300000">300,000đ</option>
								<option value="500000">500,000đ</option>
								<option value="1000000">1,000,000đ</option>
							</select>

							<input type="number" name="seri" class="form-control mb-3" placeholder="Nhập seri">

							<input type="number" name="mathe" class="form-control mb-3" placeholder="Nhập mã thẻ">

							<button type="submit" name="napthe_submit" class="btn btn-info" style="width: 100%">Nạp thẻ</button>
						</form>
					</div>

				</center>

			</div>
		</div>

		<div class="col-md-8 col-12">
			<div class="text-center py-5 container">



				<table class="table table-hover table-light table-responsive border">
					<thead>
						<tr>
							<th>STT</th>             
							<th>Loại thẻ</th>
							<th>Mệnh giá</th>	
							<th>Serial</th>							
							<th>Time</th>
							<th>Trang thái</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$stt = 0;

						$result = mysqli_query($connect, "SELECT * FROM napthe WHERE uid = '".$user['id']."' ORDER BY id DESC");
						while($row = mysqli_fetch_assoc($result)){
							$stt++;
							?>
							<tr>
								<td><?php echo $stt; ?></td>                      
								<td class="text-uppercase">
									<?php echo $row['loaithe']; ?>
								</td>
								<td><?php echo number_format($row['menhgia']); ?>đ</td>      
								<td><?php echo $row['serial']; ?></td>      
								<td><?php echo $row['time']; ?></td>
								<td><?php echo check_trangthai($row['trangthai']); ?></td>                              
							</tr>
							<?php
						}
						?>





					</tbody>
				</table>



			</div>
		</div>

	</div>
</div>
<div class="py-4"></div>

<?php
if (isset($_POST['napthe_submit'])) {
	?>
	<meta http-equiv="refresh" content="1;url=">
	<?php



	if (empty($_POST['loaithe']) || empty($_POST['seri']) || empty($_POST['mathe']) || empty($_POST['menhgia'])) {
		$err = 'Bạn cần nhập đầy đủ thông tin';
		echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';
	} else {
		$type = $_POST['loaithe'];
		$pin = $_POST['mathe'];
		$serial = $_POST['seri'];
		$amount = $_POST['menhgia'];
		$check = mysqli_query($connect, "SELECT * FROM `napthe` WHERE `mathe` = '$pin' AND `serial` = '$serial'");
		$check = mysqli_num_rows($check);

		if ($type == '' || $serial == '' || $pin == '' || $amount == '') {
			$err = 'Bạn cần nhập đầy đủ thông tin';
			echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';
		}elseif($check >= 1){
			$err = 'Thẻ đã tồn tại trên hệ thống';
			echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';
		} else {
			

			require_once(__DIR__.'/../config/napthe.php'); //gọi đến file config.php để chèn vào code.

			$dataPost = array();
			$dataPost['partner_id'] = $partner_id;
			$dataPost['request_id'] = $user['id'];
			$dataPost['telco'] = $type;
			$dataPost['amount'] = $amount;
			$dataPost['serial'] = $serial;
			$dataPost['code'] = $pin;
			$dataPost['command'] = 'charging';
			$sign = creatSign($sign, $dataPost);
			$dataPost['sign'] = $sign;

			$dataPost = http_build_query($dataPost);



			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 300); //THÊM DÒNG NÀY SẼ TĂNG THỜI GIAN GỬI THẺ ĐƯỢC ỔN ĐỊNH
			$resultRaw = curl_exec($ch);
			curl_close($ch);
			$obj = json_decode($resultRaw);




			if($obj->status == 99){

				$err = $obj->message;
				echo '<script>swal("Thông báo", "'.$err.'", "success");</script>';

				mysqli_query($connect, "INSERT INTO `napthe` SET
					`uid` = '".$user["id"]."',
					`serial` = '$serial',
					`mathe` = '$pin',
					`loaithe` = '$type',
					`menhgia` = '$amount',
					`trangthai` = '0',
					`time` = '$time'
					");

			} else {

				$err = $obj->message;
				echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';
			}





		}
	}

}
?>



<?php
require_once __DIR__."/../../theme/footer.php";
?>