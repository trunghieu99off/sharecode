<?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

if(!isset($_SESSION['user'])){
    header('location: /');
}
$id  = intval(getInput('id'));
   $sql = "SELECT manguon.*,ngonngu.name as namecate,theloai.name as nametheloai ,nhomcode.name as namenhomcode FROM manguon LEFT JOIN ngonngu on ngonngu.id = manguon.idngonngu LEFT JOIN theloai ON theloai.id = manguon.idtheloai LEFT JOIN nhomcode ON nhomcode.id =manguon.idnhomcode  WHERE manguon.id=$id";
$chitietsc = mysqli_fetch_array(mysqli_query($connect, $sql));
?>
<div class="container" style="margin-top: 65px;" >
    <div class="row">
        <div class="col-xs-12 col-sm-9">
            <div class="row">
                        <div class="col-sm-4">
                            <div class="img-border">
                                <img id="mainbody_contentbody_CodeImage" title="<?php echo $chitietsc['name'] ?>" class="img-val" itemprop="image" src="<?php echo public_manguon()?><?php echo $chitietsc['thunb'] ?>">
                            </div>
                            <div class="text-center dt-gallery"><a href="#anh-demo" class="aorange"><span id="mainbody_contentbody_CountGallery">Xem 6 Ảnh demo</span></a></div>

                        </div>
                        <div class="col-sm-8 dt-center">
                            <h1 id="mainbody_contentbody_TitleCode" class="dt-title bold" itemprop="name"><?php echo $chitietsc['name'] ?></h1>
                            <span class="green dt-title bold text-nowrap">[Mã code <span id="mainbody_contentbody_Code" itemprop="productID"><?php echo $chitietsc['id'] ?></span>]</span>
                             <meta itemprop="mpn" content="17527">
                                    <meta itemprop="sku" content="17527">
                            <div class="row title5">
                                <div class="col-md-6 col-lg-7 dt-sta-vie">
                                    <div id="mainbody_contentbody_CodeRate" class="rateit rate-po rateit-bg" data-rateit-readonly="true" data-rateit-value="5"><button id="rateit-reset-2" type="button" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-2" style="display: none;"><span></span></button><div id="rateit-range-2" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-2" aria-valuemin="0" aria-valuemax="5" aria-valuenow="5" aria-readonly="true" style="width: 80px; height: 16px;"><div class="rateit-empty"></div><div class="rateit-selected" style="height: 16px; width: 80px;"></div><div class="rateit-hover" style="height: 16px;"></div></div></div>
                                    &nbsp;&nbsp;<span id="mainbody_contentbody_totalRate" class="text-nowrap">1 Đánh giá</span>&nbsp;&nbsp; <a href="#danh-gia" class="text-nowrap"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Viết đánh giá</a>
                                </div>
                                <div class="col-md-6 col-lg-5 dt-sta-vie2 orange">
                                    <i class="fa fa-download" aria-hidden="true"></i>&nbsp;<b id="mainbody_contentbody_DownloadCount">1174</b>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="dt-vie-ic">&nbsp;<b id="mainbody_contentbody_Views">7932</b></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="text-nowrap"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp;<b id="mainbody_contentbody_Likes">21</b></span>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="row">
                                <div class="col-sm-10 col-md-8 dt-price">
                                    <span class="bold">Phí tải: <span id="mainbody_contentbody_Copyright" class="green">Miễn phí</span></span>
                                    
                                </div>
                                <div class="col-sm-2 col-md-4 dt-pri-btn text-center">
                                    <a id="mainbody_contentbody_btnLike" title="Yêu thích code này" class="button-orange button-small LikeSuccess" href="javascript:__doPostBack('ctl00$ctl00$mainbody$contentbody$btnLike','')"><i class="fa fa-heart line-h20" aria-hidden="true"></i><span class="hidden-sm">&nbsp; YÊU THÍCH</span></a>&nbsp;
                                
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="row">
                                <div class="col-md-7 dt-des">
                                 <meta itemprop="brand" content="sharecode.vn">
                                    <meta itemprop="releaseDate" content="22/01/2018 2:59:31 SA">
                                    <div class="dt-col">Danh mục </div>
                                    <div itemprop="material"><a href="/ngon-ngu-lap-trinh/php-mysql-21.htm" id="mainbody_contentbody_Lang2" class="aorange" target="_blank"><?php echo $chitietsc['namecate'] ?></a></div>
                                    <div class="dt-col">Thể loại </div>
                                    <div itemprop="category"><a href="/the-loai-source-code/website-1.htm" id="mainbody_contentbody_Category2" class="aorange" target="_blank"><?php echo $chitietsc['nametheloai'] ?></a></div>
                                    <div class="dt-col">Nhóm Code </div>
                                    <div itemprop="category"><a href="/the-loai-source-code/website-1.htm" id="mainbody_contentbody_Category2" class="aorange" target="_blank"><?php echo $chitietsc['namenhomcode'] ?></a></div>
                                    <div class="dt-col">Ngày đăng </div>
                                    <div id="mainbody_contentbody_Date2"><?php echo $chitietsc['created'] ?></div>
                                </div>
                                <div class="col-md-5 dt-dow-vie">
                                    <a href="#Download" class="btn2 button-down bold" title="Download code này">&nbsp; DOWNLOAD</a>
                                    
                                </div>
                            </div>
                            <div class="line"></div>
                        </div>
                    </div>
        </div>
           <div class="col-xs-12 col-sm-3">
            <div id="boxUserInfo" class="left-module box-border2 bg-colo" itemprop="seller" itemscope="" itemtype="http://schema.org/Organization">
                    <div id="mainbody_contentbody_lblauthor" class="bold us-head">NGƯỜI ĐĂNG</div>
                    <div class="pro-left">
                        <a href="/thanh-vien/thehien233-24.htm" id="mainbody_contentbody_AvantaLink" target="_blank">
                            <img src="/FilesUpload/User/13_41_12_sdfsffss.jpg" id="mainbody_contentbody_Avanta" class="prof_img" width="90" height="90" itemprop="image" title="Thành viên Thế Hiển" alt="Thế Hiển">
                        </a>
                    </div>
                    <div class="pro-right">
                        <a href="/thanh-vien/thehien233-24.htm" id="mainbody_contentbody_UserName" target="_blank" class="agreen bold title4 pro-title" itemprop="url" title="Thành viên Thế Hiển"><span id="mainbody_contentbody_NameText" itemprop="name">Thế Hiển</span></a>
                        <div class="line"></div>
                        <div class="pro-money us-bg-no">
                            <span class="txt-colo">Miễn phí </span><b id="mainbody_contentbody_CodeFree">3 Code</b><br>
                            <span class="txt-colo">Có phí </span><b id="mainbody_contentbody_CodePremium">0 Code</b><br>
                        </div>

                    </div>
                    <div class="clear us-pad">&nbsp;</div>
                </div>
        </div>

        </div>

    </div>
</div>
<?php
require_once __DIR__."/../../theme/footer.php";
?>