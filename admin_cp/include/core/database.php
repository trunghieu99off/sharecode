<?php
require_once __DIR__."/../../../autoload/autoload.php";
if(isset($user['chucvu'])){
	if($user['chucvu'] != 9){
		header('location: /sharecode');
	}
} else {
	header('location: /sharecode');
}
?>