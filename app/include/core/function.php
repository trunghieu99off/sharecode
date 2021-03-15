<?php
function ansuzhi_format($var){
	$dulieu = trim(addslashes(htmlspecialchars($var)));
	return $dulieu;    
}

function trangthai_taoweb($tt){
	if($tt == 0){
		return 'Đang tạo';
	}

	if($tt == 1){
		return 'Tạo thất bại';
	}

	if($tt == 2){
		return 'Đang hoạt động';
	}

}

function trangthai_giahan($tt){
	if($tt == 0){
		return 'Chờ gia hạn';
	}

	if($tt == 2){
		return 'Hoàn thành';
	}
}

function chucvu($stt){
	if($stt == 1){
		return 'Thành viên';
	}
	if($stt == 9){
		return 'Admin';
	}
	return 'Không xác định';
}

function check_trangthai($trangthai){
	if($trangthai == 0){
		return 'Chờ duyệt';
	}
	if($trangthai == 1){
		return 'Thẻ sai';
	}
	if($trangthai == 2){
		return 'Thành công';
	}
}

?>