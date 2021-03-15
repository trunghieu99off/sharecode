<?php 
	 require_once"autoload/autoload.php";
	  $open = "ngonngu";
   $sqlngonngu =$db->fetchAll("ngonngu");	
	 ?>
<body>
	<style type="text/css">
		#fixNav{
  width: 100%;
  height: 55px;
  background-color: #265325;
  display: block;
  box-shadow: 0px 2px 2px rgba(0,0,0,0.5); 
  position: fixed; /*Cho menu cố định 1 vị trí với top và left*/
  top: 0; /*Nằm trên cùng*/
  left: 0; /*Nằm sát bên trái*/
  z-index: 100000; 
}
	</style>
	<nav  id="fixNav" class="navbar navbar-expand-lg navbar-light bg-light mb-1 shadow-lg p-1	">

         <a class="navbar-brand" href="/" style="margin-left: 25px">
				
	<style type="text/css">
	.thut{
		margin-left: -265px;
		padding-right: 15px;
	}
	.dropbtn {
  background-color: #17a2b8;
  color: white;
  padding: 8px;
  font-size: 14px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {

  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {background-color: #ddd;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #17a2b8
</style>

		<div class="container" style="margin-top: -25px; " >
			<div class="thut">
				<img src="">
				<div class="dropdown">
 					 <button class="dropbtn"><i class="fa fa-bars"></i>&nbsp;&nbsp;&nbsp;&nbsp;DANH MỤC MÃ NGUỒN</button>
 					 <div class="dropdown-content">
    					 <?php foreach ($sqlngonngu as $item): ?>
       	
									<a href=""><img class="icon-menu"  src="http://localhost/sharecode/public/images/3.png">&nbsp;&nbsp;<?php echo $item['name']?></a>					 
   					    <?php endforeach ?>
 					 </div>
					</div>	
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse text-uppercase font-weight-light" id="navbarSupportedContent" >

				<ul class="navbar-nav mr-auto">
					<li class="nav-item active" style="border-radius:25px;">
						<a class="nav-link" href="/sharecode/">Trang chủ <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="/sharecode/codecl">Code Chất Lượng</a>
								
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="/sharecode/codetk">Code Tham Khảo<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="/sharecode/codemp">Code Miễn Phí<span class="sr-only">(current)</span></a>
					</li>
					
				</ul>

				<div class="mb-4"></div>

				<div class="float-right">
					<?php
					if(isset($_SESSION['user'])){
						?>

						<ul class="navbar-nav mt-auto" style="margin-right: -30px;">
							<li class="nav-item dropdown">
								<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<button class="btn btn-info dropdown-toggle">
							
										<text class="text-uppercase"><?php echo $_SESSION['user']; ?></text> - <?php echo number_format($user['tien']).'đ'; ?>
									</button>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<?php
									if($user['chucvu'] == 9){
										?>
										<a class="dropdown-item text-danger" href="/sharecode/admin_cp">Admin Cpanel</a>
										<?php
									}
									?>
									<a class="dropdown-item" href="/sharecode/profile">Tài Khoản</a>
									<a class="dropdown-item" href="/sharecode/thu-vien">Thư Viện</a>
									<a class="dropdown-item" href="/sharecode/napthe">Nạp tiền</a>

									<a href="/sharecode/profile/doi-mat-khau" class="dropdown-item" style="width: 100%">
									Đổi mật khẩu
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="/sharecode/dang-xuat">Đăng xuất</a>
								</div>
							</li>
						</ul>

						<?php
					} else {
						?>
						<a href="/sharecode/dang-ky"><button class="btn btn-info" style="width: 130px">Đăng ký</button></a>
						<a href="/sharecode/dang-nhap"><button class="btn btn-info" style="width: 130px">Đăng nhập</button></a>

						<?php
					}
					?>

				</div>

			</div>

		</div>
		
	</nav>
	
	