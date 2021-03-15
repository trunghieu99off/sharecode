<?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

if(!isset($_SESSION['user'])){
    header('location: /sharecode');
}

?>
<div class="container">

<img src="/sharecode/public/images/cover.png" style="width: 100%" class="rounded">

<div class="text-center" style="margin-top: -10%">
<img src="/sharecode/public/images/avatar.png" style="width: 150px" class="rounded mb-3">
<h3 class="text-dark text-uppercase font-weight-light">
    <?php echo $user['taikhoan']; ?> (<?php echo number_format($user['tien']); ?>đ)

</h3>



<div class="row" style="margin-top: 5%">

<div class="col-md-3 text-left mb-4">
    
<h3 class="text-uppercase text-light text-left font-weight-light"></h3>

<a href="/sharecode/profile" class="text-dark text-uppercase btn btn-light mb-3" style="width: 100%">
Thông tin profile
</a><br>

<br>

<a href="/sharecode/profile/lich-su-tao-web" class="text-dark text-uppercase btn btn-light mb-3" style="width: 100%">
Cập nhật
</a><br>
</div>


<div class="col-md-9">

<h3 class="text-uppercase text-dark text-left font-weight-light"></h3>



<table class="table table-striped table-light">
        <tbody>
            <tr>
                <th scope="row">ID của bạn:</th>
                <th><span class="c-font-uppercase" data-toggle="tooltip" data-placement="top" title="" data-original-title="Đây là ID tài khoản của bạn không phải mã giới thiệu"><?php echo $user['id']; ?></span></th>
            </tr>
            <tr>
                <th scope="row">User:</th>
                <th class="text-uppercase"><?php echo $user['taikhoan']; ?></th>
            </tr>
            <tr>
                <th scope="row">Số dư tài khoản:</th>
                <td><b class="text-danger"><?php echo number_format($user['tien']); ?>đ</b></td>
            </tr>
            <tr>
                <th scope="row">Nhóm tài khoản:</th>
                <td><font><?php echo chucvu($user['chucvu']); ?></font></td>
            </tr>
            <tr>
                <th scope="row">Ngày tham gia:</th>
                <td><font><?php echo $user['time']; ?></font></td>
            </tr>
        </tbody>
    </table>


</div>

</div>

</div>



</div>
<div class="py-3"></div>
<?php
require_once __DIR__."/../../theme/footer.php";
?>