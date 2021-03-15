<?php
session_start();
require_once __DIR__. "/../libraries/Database.php";
require_once __DIR__. "/../libraries/Function.php";
require_once __DIR__. "/../app/include/core/function.php";
$db = new database;
$connect = mysqli_connect("localhost","root","","sharecode");

//thiết lập database uft-8
mysqli_query($connect,"SET NAMES 'UTF8'");
define("ROOT", $_SERVER['DOCUMENT_ROOT']."/sharecode/public/uploads/");

//get thông tin user
if(isset($_SESSION['user'])){
	$user = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM user WHERE taikhoan = '".$_SESSION['user']."'"));
	
	if($user['band'] == 1){
		exit('Bạn đã bị band!');
	}
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = date('d/m/Y - H:i:s');

?>