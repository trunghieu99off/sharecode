<?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";
  $open = "manguon";
   $sql = "SELECT manguon.*,ngonngu.name as namecate FROM manguon
    LEFT JOIN ngonngu on ngonngu.id = manguon.idngonngu ORDER BY created DESC"; 
    $sqll = "SELECT manguon.*,ngonngu.name as namecate FROM manguon
    LEFT JOIN ngonngu on ngonngu.id = manguon.idngonngu ORDER BY luottai DESC LIMIT 4"; 
    $sqlll = "SELECT manguon.*,ngonngu.name as namecate FROM manguon
    LEFT JOIN ngonngu on ngonngu.id = manguon.idngonngu ORDER BY luotxem DESC LIMIT 6"; 

      $manguon =$db->fetchJone('manguon',$sql,100,true);
       $manguonnew =$db->fetchJone('manguon',$sqll,4,true);
       $manguonnews =$db->fetchJone('manguon',$sqll,100,true);
      $banner=$db->fetchAll('bannerQC');
?>  
<div class="row"> 
<div class="center_column col-xs-12 col-sm-1" >
</div> 
<div class="center_column col-xs-12 col-sm-9" style="margin-top: 49px;margin-left: -50px;" >        
         <div class="container mb-3">
	
	<div id="carouselExampleControls" class="carousel slide py-3 mb-4" data-ride="carousel">
		<div class="carousel-inner" style="max-height: 440px; overflow: hidden;">
		 <?php foreach ($banner as $item): ?>	
		 <?php if($item['trangthai']==1){ ?> 
			<div class="carousel-item active">
				<img src="<?php echo $item['link'] ?>" class="d-block w-100" alt="..." style="height: 440px;" >
			</div>
		<?php }elseif ($item['trangthai']==0) {?>
			<div class="carousel-item">
				<img src="<?php echo $item['link'] ?>" class="d-block w-100" alt="..."  style="height: 440px;">
			</div>
		<?php } ?>
			<?php endforeach ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>

	</div>
<style type="text/css">
	.viewspan{
		margin-left: -45px;

	}
	.viewdow{
		margin-right: -45px;
	}
</style>
<div id="mainbody_contentbody_contentpage_regPanel" onkeypress="javascript:return WebForm_FireDefaultButton(event, 'mainbody_contentbody_contentpage_btnSearch')">
	
    <div class="search-box">
        <div class="bold green title">TÌM KIẾM NÂNG CAO</div>
        <div class="row">
            <div class="col-sm-3">
                        <div class="form-group">
                            <label class="bold">Danh mục</label>
                            <select name="ctl00$ctl00$ctl00$mainbody$contentbody$contentpage$ddlLang" id="mainbody_contentbody_contentpage_ddlLang" class="form-control" style="color: rgb(255, 132, 1);">
		<option value="0" style="color: rgb(126, 89, 42);">--Tất cả--</option>
		<option value="15" style="color: rgb(126, 89, 42);">Android</option>
		<option value="23" style="color: rgb(126, 89, 42);">iOS</option>
		<option value="26" style="color: rgb(126, 89, 42);">Windows phone</option>
		<option selected="selected" value="21" style="color: rgb(255, 132, 1);">PHP &amp; MySQL</option>
		<option value="29" style="color: rgb(126, 89, 42);">WordPress</option>
		<option value="28" style="color: rgb(126, 89, 42);">Joomla</option>
		<option value="17" style="color: rgb(126, 89, 42);">Visual C#</option>
		<option value="16" style="color: rgb(126, 89, 42);">Asp/Asp.Net</option>
		<option value="20" style="color: rgb(126, 89, 42);">Java/JSP</option>
		<option value="19" style="color: rgb(126, 89, 42);">Visual Basic</option>
		<option value="24" style="color: rgb(126, 89, 42);">Cocos2D</option>
		<option value="27" style="color: rgb(126, 89, 42);">Unity</option>
		<option value="18" style="color: rgb(126, 89, 42);">Visual C++</option>
		<option value="25" style="color: rgb(126, 89, 42);">Html &amp; Template</option>
		<option value="22" style="color: rgb(126, 89, 42);">Khác</option>

	</select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="bold">Thể loại</label>
                            <select name="ctl00$ctl00$ctl00$mainbody$contentbody$contentpage$ddlType" id="mainbody_contentbody_contentpage_ddlType" class="form-control" style="color: rgb(126, 89, 42);">
		<option selected="selected" value="0" style="color: rgb(126, 89, 42);">--Tất cả--</option>
		<option value="1" style="color: rgb(126, 89, 42);">Website</option>
		<option value="2" style="color: rgb(126, 89, 42);">Phần mềm - Ứng dụng</option>
		<option value="3" style="color: rgb(126, 89, 42);">Game</option>
		<option value="4" style="color: rgb(126, 89, 42);">Khác</option>

	</select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="bold">Xu tải</label>
                            <select name="ctl00$ctl00$ctl00$mainbody$contentbody$contentpage$ddlXu" id="mainbody_contentbody_contentpage_ddlXu" class="form-control" style="color: rgb(255, 132, 1);">
		<option value="all" style="color: rgb(126, 89, 42);">--Tất cả--</option>
		<option selected="selected" value="free" style="color: rgb(255, 132, 1);">Miễn phí (0 Xu)</option>
		<option value="code" style="color: rgb(126, 89, 42);">Code tham khảo (2 Xu - 99 Xu)&nbsp;</option>
		<option value="codeok" style="color: rgb(126, 89, 42);">Code chất lượng (&gt;= 100 Xu)</option>

	</select>
                        </div>
                    </div>
              <div class="col-sm-3">
                   
                     <div class="form-group">
                        <label class="bold">Loại file</label>
                        <select name="ctl00$ctl00$ctl00$mainbody$contentbody$contentpage$ddlFileType" id="mainbody_contentbody_contentpage_ddlFileType" class="form-control" style="color: rgb(126, 89, 42);">
		<option selected="selected" value="0" style="color: rgb(126, 89, 42);">--Tất cả--</option>
		<option value="2" style="color: rgb(126, 89, 42);">Full code</option>
		<option value="9" style="color: rgb(126, 89, 42);">Code</option>
		<option value="1" style="color: rgb(126, 89, 42);">Full code + Báo cáo</option>
		<option value="3" style="color: rgb(126, 89, 42);">Tài liệu</option>
		<option value="5" style="color: rgb(126, 89, 42);">Full code + PSD</option>
		<option value="6" style="color: rgb(126, 89, 42);">PSD</option>
		<option value="7" style="color: rgb(126, 89, 42);">File chạy(.exe) </option>
		<option value="8" style="color: rgb(126, 89, 42);">Full code + Hướng dẫn</option>
		<option value="10" style="color: rgb(126, 89, 42);">Khác</option>

	</select>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-sm-4 ">
                    <div class="form-group">
                        <label class="bold">Cách tìm</label>
                        <table id="mainbody_contentbody_contentpage_radModeSearch">
		<tbody><tr>
			<td><input id="mainbody_contentbody_contentpage_radModeSearch_0" type="radio" name="ctl00$ctl00$ctl00$mainbody$contentbody$contentpage$radModeSearch" value="searchLarge" checked="checked"><label for="mainbody_contentbody_contentpage_radModeSearch_0">&nbsp;Tìm gần đúng&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td><input id="mainbody_contentbody_contentpage_radModeSearch_1" type="radio" name="ctl00$ctl00$ctl00$mainbody$contentbody$contentpage$radModeSearch" value="searchTrue"><label for="mainbody_contentbody_contentpage_radModeSearch_1">&nbsp;Tìm chính xác</label></td>
		</tr>
	</tbody></table>
                    </div>
                </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                        <label class="bold">Sắp xếp</label>
                        <select name="ctl00$ctl00$ctl00$mainbody$contentbody$contentpage$ddlSort" id="mainbody_contentbody_contentpage_ddlSort" class="form-control" style="color: rgb(255, 132, 1);">
		<option value="good" style="color: rgb(126, 89, 42);">--Kết quả tốt nhất--</option>
		<option value="down" style="color: rgb(126, 89, 42);">Tải nhiều</option>
		<option value="view" style="color: rgb(126, 89, 42);">Xem nhiều</option>
		<option selected="selected" value="new" style="color: rgb(255, 132, 1);">Mới nhất</option>

	</select>
                    </div>
                </div>
                <div class="col-sm-5">
                <div class="form-group">
                    <label class="bold">Tìm kiếm code</label>
            <div class="input-group">
                <input name="ctl00$ctl00$ctl00$mainbody$contentbody$contentpage$txtSearchAdv" type="text" id="mainbody_contentbody_contentpage_txtSearchAdv" class="form-control txt-auto ui-autocomplete-input" placeholder="Từ khóa (or) Mã code" autocomplete="off">
                <span class="input-group-btn">
                    <a id="mainbody_contentbody_contentpage_btnSearch" class="btn btn-inline-orange btn-search-ad bold" type="button" href="javascript:__doPostBack('ctl00$ctl00$ctl00$mainbody$contentbody$contentpage$btnSearch','')">TÌM KIẾM &nbsp;</a>
                </span>
            </div>
                </div>
            </div>
        </div>
    </div>
        
</div>
 <h1 class="page-heading">
                                <span class="page-heading-title" style="border-bottom: 3px solid #17a2b8 !important;">SOURCE CODE</span>
                            </h1>
	<div class="row">

 <?php foreach ($manguon as $item): ?>
 	 <a href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
		<div class="col-12 col-md-3 mb-3">
			<div class="row">
				<div class="col-10 col-md-12">
					<center>
						<div class="card" style="width: 85%;">
							<img src="<?php echo public_manguon()?><?php echo $item['thunb'] ?>" style="height: 130px" class="card-img-top">
							<div class="card-body"  style="margin-top: -20px;">
								<div class="downview"  >
                                                           <span class="view-count2"><?php echo $item['luotxem'] ?></span>
                                                            <span class="down-count2"><?php echo $item['luottai'] ?></span>
                                </div>
                              <a style="color: #ff8401 !important;"class="cate" href="" ><?php echo $item['namecate']?> </a>
								 <a href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>"><div class="right-block">
                                                        <a itemprop="url" href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
                                                            <h3  itemprop="name" class="product-name bold" title="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></h3>
                                                        </a>
                                                        
                                                    </div></a>
							</div>
						</div>
					</center>
				</div>
			
			</div>
		</div>
	</a>
	<?php endforeach ?>
</div>
	<h1 class="page-heading">
                                <span class="page-heading-title" style="border-bottom: 3px solid #17a2b8 !important;">Website Mới</span>
                            </h1>
                            <div class="row">
        <?php foreach ($manguon as $item): ?>
   		<?php if($item['idtheloai']==1){ ?>
    <a href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
		<div class="col-12 col-md-3 mb-3">
			<div class="row">
				<div class="col-10 col-md-12">
					<center>
						<div class="card" style="width: 85%;">
							<img src="<?php echo public_manguon()?><?php echo $item['thunb'] ?>" style="height: 130px" class="card-img-top">
							<div class="card-body"  style="margin-top: -20px;">
								<div class="downview"  >
                                                           <span class="view-count2"><?php echo $item['luotxem'] ?></span>
                                                            <span class="down-count2"><?php echo $item['luottai'] ?></span>
                                </div>
                                <a style="color: #ff8401 !important;"class="cate" href="" ><?php echo $item['namecate']?> </a>
								 <a href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>"><div class="right-block">
                                                        <a itemprop="url" href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
                                                            <h3 itemprop="name" class="product-name bold" title="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></h3>
                                                        </a>
                                                       
                                                    </div></a>
							</div>
						</div>
					</center>
				</div>
			
			</div>
		</div>
	</a>
	<?php }?>
	 <?php endforeach ?>
	</div>
	  <h1 class="page-heading">
                                <span class="page-heading-title" style="border-bottom: 3px solid #17a2b8 !important;">Game nổi bật</span>
                            </h1>
                            <div class="row">
<?php foreach ($manguon as $item): ?>
	<?php if($item['idtheloai']==2){ ?>
     <a href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
		<div class="col-12 col-md-3 mb-3">
			<div class="row">
				<div class="col-10 col-md-12">
					<center>
						<div class="card" style="width: 85%;">
							<img src="<?php echo public_manguon()?><?php echo $item['thunb'] ?>" style="height: 130px" class="card-img-top">
							<div class="card-body"  style="margin-top: -20px;">
								<div class="downview">
                                                            <span class="view-count2"><?php echo $item['luotxem'] ?></span>
                                                            <span class="down-count2"><?php echo $item['luottai'] ?></span>
                                                        </div>
								
                                <a style="color: #ff8401 !important;" class="cate" href="" ><?php echo $item['namecate']?> </a>
								 <a href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>"><div class="right-block">
                                                        <a itemprop="url" href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
                                                            <h3 itemprop="name" class="product-name bold" title="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></h3>
                                                        </a>
                                                        
                                                    </div></a>
							</div>
						</div>
					</center>
				</div>
			
			</div>
		</div>
	</a>
                        <?php }?>
						<?php endforeach ?>
					</div>
						<h1 class="page-heading">
                                <span class="page-heading-title" style="border-bottom: 3px solid #17a2b8 !important;">Phần Mềm và Ứng Dụng</span>
                            </h1>
                            <div class="row">
	<?php foreach ($manguon as $item): ?>
                        <?php if($item['idtheloai']==3){ ?>
                        	 <a href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
		<div class="col-12 col-md-3 mb-3">
			<div class="row">
				<div class="col-10 col-md-12">
					<center>
						<div class="card" style="width: 85%;">
							<img src="<?php echo public_manguon()?><?php echo $item['thunb'] ?>" style="height: 130px" class="card-img-top">
							<div class="card-body"  style="margin-top: -20px;">
								<div class="downview"  >
                                                           <span class="view-count2"><?php echo $item['luotxem'] ?></span>
                                                            <span class="down-count2"><?php echo $item['luottai'] ?></span>
                                </div>
                                <a style="color: #ff8401 !important;" class="cate" href="" ><?php echo $item['namecate']?> </a>
								 <a href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
									<div class="right-block">
                                                        <a itemprop="url" href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
                                                            <h3 itemprop="name" class="product-name bold" title="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></h3>
                                                        </a>
                                                       
                                                    </div>
								</a>
							</div>
						</div>
					</center>
				</div>
			
			</div>
		</div>
	</a>
		 <?php }?>
        <?php endforeach ?>
        </div>
        <h1 class="page-heading">
                                <span class="page-heading-title" style="border-bottom: 3px solid #17a2b8 !important;">CODE Gợi ý cho bạn </span>
                            </h1>
                            <div class="row">
	<?php foreach ($manguonnew as $item): ?>
                        	 <a href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
		<div class="col-12 col-md-3 mb-3">
			<div class="row">
				<div class="col-10 col-md-12">
					<center>
						<div class="card" style="width: 85%;">
							<img src="<?php echo public_manguon()?><?php echo $item['thunb'] ?>" style="height: 130px" class="card-img-top">
							<div class="card-body"  style="margin-top: -20px;">
								<div class="downview"  >
                                                           <span class="view-count2"><?php echo $item['luotxem'] ?></span>
                                                            <span class="down-count2"><?php echo $item['luottai'] ?></span>
                                </div>
                   				<a style="color: #ff8401 !important;" class="cate" href="" ><?php echo $item['namecate']?> </a>
								 <a  href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>" title="<?php echo $item['name'] ?>"><div class="right-block">
                                                        <a itemprop="url" href="/sharecode/chi-tiet-code?id=<?php echo $item['id']; ?>">
                                                            <h3 itemprop="name" class="product-name bold" title="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></h3>
                                                        </a>
                                                       
                                                    </div></a>
							</div>
						</div>
					</center>	
				</div>
			
			</div>
		</div>
	</a>	
        <?php endforeach ?>
        </div>
</div>
</div>     
<div class="center_column col-xs-12 col-sm-2" style="margin-top: 65px;">
	<div class="header-banner banner-opacity">
                        

<style>
    /*Hoạt động gần đây*/
    .action {
        height: 70%;
        overflow: hidden;
        border: 1px solid #e2d8c7;
        font-size: 13px;
        background: #faf8f1;
        border-radius: 0px 0px 4px 0px;
    }

        .action .title_ac {
            height: 32px;
            text-align: center;
            background: #e2d8c7;
            padding-top: 8px;
            border-radius: 16px;
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            margin: 8px 0px;
        }

    .log_re {
        height: 30%;
        color: #ff8401;
        background: #faf8f1;
        border-right: 1px solid #e2d8c7;
            border-left: 1px solid #e2d8c7;
            padding-right: 0px;
    }
    .log_re .pad15 {
            padding-right: 15px;
    }
        .log_re .fa_go {
            height: 30%;
            color: #fff;
            padding: 5px 13px;
        }

        .log_re .lo_re {
            height: 70%;
            text-align: center;
        }


        .log_re .logi {
            padding-top: 25px;
            color: #84c52c;
            height: 100%;
            padding-bottom:7px;
            border-right: 1px solid #e2d8c7;
        }
         .log_re .logi:hover {
            color: #648d03;
        }

            .log_re .logi:before {
                font: normal normal normal 27px/1 FontAwesome;
                content: "\f090 ";
            }

        .log_re .regt {
            padding-top: 25px;
            height: 100%;
        }
        .log_re .regt:hover {
            color: #db6200;
        }
            .log_re .regt:before {
                font: normal normal normal 27px/1 FontAwesome;
                content: "\f234";
            }

    .action_box {
        color: #d5c6ae;
    }

        .action_box ul {
            width: 100%;
        }

        .action_box li {
            background: url('/Image/marker.png') no-repeat left 0px top 14px;
            list-style: none;
            padding: 7px 0px 6px 13px;
            line-height: 15px;
        }

            .action_box li .lnkGreen {
                color: #84c52c;
                text-decoration: none;
                font-weight: bold;
                font-size: 12px;
            }

                .action_box li .lnkGreen:hover {
                    text-decoration: underline;
                }

            .action_box li .lnkOrange {
                color: #a9834f;
                text-decoration: none;
            }

                .action_box li .lnkOrange:hover {
                    color: #ff8401;
                }

            .action_box li .Orange {
                color: #ff8401;
            }

            .action_box li .Green {
                color: #84c52c;
            }
</style>
<div class="col-md-12 log_re">
    <div id="mainbody_ucAction_divLogin" class="pad15">
    	<?php
					if(isset($_SESSION['user'])){
						?>
						
		<?php
					} else { ?>
        <div class="row fa_go">
            <a id="mainbody_ucAction_LinkButton1" title="Đăng nhập nhanh bằng tài khoản Facebook" class="loginBtn loginBtn-facebook alignleft" href="javascript:__doPostBack('ctl00$mainbody$ucAction$LinkButton1','')">Log in</a>
            <a id="mainbody_ucAction_LinkButton2" title="Đăng nhập nhanh bằng tài khoản Google" class="loginBtn loginBtn-google alignright" href="javascript:__doPostBack('ctl00$mainbody$ucAction$LinkButton2','')">Log in</a>
        </div>
        <div class="row lo_re">
            <div class="col-md-6 logi" >
                <a href="/sharecode/dang-nhap"> <p>Đăng nhập</p></a>
            </div>
            <div class="col-md-6 regt">
            	 <a href="/sharecode/dang-ky" class="orange">
                <p>Đăng kí</p></a>
            </div>
        </div>
        <?php
					}
					?>
    </div>
    
</div>
<div class="col-md-12 action" >
    <div class="title_ac bold">
        HOẠT ĐỘNG GẦN ĐÂY
    </div>
    <div class="action_box" style="margin-left: -40px">
        <ul>
            
                    <li><a href="/thanh-vien/phi-134585.htm" target="_blank" class="lnkGreen">Phi</a> vừa có thêm <span class="Orange">6 XU</span> vào tài khoản</li>
                
                    <li><a href="/thanh-vien/vu-149062.htm" target="_blank" class="lnkGreen">Nguyễn Tuấn Vũ</a> vừa có thêm <span class="Orange">14 XU</span> vào tài khoản</li>
                 
        </ul>
    </div>
</div>
<style type="text/css">
	.tit{
		background: url(/sharecode/public/images/logo_popup.png) no-repeat right, url(/sharecode/public/images/bg_green.jpg);
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        padding-left: 28px;
        text-transform: uppercase;
        padding-top: 11px;
        padding-bottom: 12px;
        border-radius:4px 4px 0px 0px;
	}
</style>

                    </div>
                    <div id="boxTopCode" style="width: 268px; background-color: #faf8f1;">       
<div class="block left-module">
	<div class="tit"> <p>CODE NỔI BẬT</p></div>
   
    <div class="block_content">
        <ul class="products-block best-sell">  
                <?php foreach ($manguonnews as $item): ?>
                    <li style="list-style-type: none;">
                        <div class="products-block-left">
                            <a href="/source-code/quan-ly-nhan-vien-windows-form-c-27252.htm">
                                <img src="<?php echo public_manguon()?><?php echo $item['thunb'] ?>" alt="" title="<?php echo $item['name'] ?>" style="width: 120px; margin-left: -10px;">
                            </a>
                        </div>
                        <div class="products-block-right">
                            <p class="product-name">
                                <a href="/source-code/quan-ly-nhan-vien-windows-form-c-27252.htm">
                                    </a></p><h3 class="title2 bold" title="<?php echo $item['name'] ?>"><a href="/source-code/quan-ly-nhan-vien-windows-form-c-27252.htm"><?php echo $item['name'] ?></a></h3><a href="/source-code/quan-ly-nhan-vien-windows-form-c-27252.htm">
                                </a>
                            <p></p>
                            <div class="rateit rateit-bg" data-rateit-value="3" data-rateit-readonly="true"><button id="rateit-reset-22" type="button" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-22" style="display: none;"><span></span></button><div id="rateit-range-22" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-22" aria-valuemin="0" aria-valuemax="5" aria-valuenow="3" aria-readonly="true" style="width: 80px; height: 16px;"><div class="rateit-empty"></div><div class="rateit-selected" style="height: 16px; width: 48px;"></div><div class="rateit-hover" style="height: 16px;"></div></div></div>
                            
                        </div>
                        <div class="products-block-bottom">
                            <div><a class="cate" href="/ngon-ngu-lap-trinh/visual-c-17.htm"><?php echo $item['namecate'] ?></a>
                                <span class="alignright view-count" style="margin-right: 15px;"><?php echo $item['luotxem'] ?></span>
                                <span class="alignright down-count"><?php echo $item['luottai'] ?></span>
                            </div>
                        </div>
                    </li>
                   <?php endforeach ?>
                
        </ul>
    </div>
</div>

                </div>
                <div id="boxTopCode" style="width: 268px; background-color: #faf8f1;">       
<div class="block left-module">
   <div class="tit"> <p class="title_block">Thông Báo</p></div>
    <div class="block_content">
        <ul class="products-block best-sell">  
                <?php foreach ($manguonnews as $item): ?>
                    <li style="list-style-type: none;">
                        <div class="products-block-left">
                            <a href="/source-code/quan-ly-nhan-vien-windows-form-c-27252.htm">
                                <img src="<?php echo public_manguon()?><?php echo $item['thunb'] ?>" alt="" title="<?php echo $item['name'] ?>" style="width: 120px; margin-left: -10px;">
                            </a>
                        </div>
                        <div class="products-block-right">
                            <p class="product-name">
                                <a href="/source-code/quan-ly-nhan-vien-windows-form-c-27252.htm">
                                    </a></p><h3 class="title2 bold" title="<?php echo $item['name'] ?>"><a href="/source-code/quan-ly-nhan-vien-windows-form-c-27252.htm"><?php echo $item['name'] ?></a></h3><a href="/source-code/quan-ly-nhan-vien-windows-form-c-27252.htm">
                                </a>
                            <p></p>
                            <div class="rateit rateit-bg" data-rateit-value="3" data-rateit-readonly="true"><button id="rateit-reset-22" type="button" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-22" style="display: none;"><span></span></button><div id="rateit-range-22" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-22" aria-valuemin="0" aria-valuemax="5" aria-valuenow="3" aria-readonly="true" style="width: 80px; height: 16px;"><div class="rateit-empty"></div><div class="rateit-selected" style="height: 16px; width: 48px;"></div><div class="rateit-hover" style="height: 16px;"></div></div></div>
                            
                        </div>
                        <div class="products-block-bottom">
                            <div><a class="cate" href="/ngon-ngu-lap-trinh/visual-c-17.htm"><?php echo $item['namecate'] ?></a>
                                <span class="alignright view-count" style="margin-right: 15px;"><?php echo $item['luotxem'] ?></span>
                                <span class="alignright down-count"><?php echo $item['luottai'] ?></span>
                            </div>
                        </div>
                    </li>
                   <?php endforeach ?>
                
        </ul>
    </div>
</div>

                </div>
</div>

</div>

<?php
require_once __DIR__."/../../theme/footer.php";
?>
<style type="text/css">
	.anamecate{
		color: #ff8401;
    font-style: italic;
    margin-top: 5px;
	}
</style>