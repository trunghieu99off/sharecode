<?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

if(!isset($_SESSION['user'])){
    header('location: /');
}

?>


<div class="container py-3 mb-5 overflow-auto" style="height: 475px; overflow: scroll">

    <table class="table table-bordered table-responsive-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Domain</th>
          <th scope="col">Loại WEB</th>
          <th scope="col">Ngày tạo</th>
          <th scope="col">Ngày hết hạn</th>
          <th scope="col">Thanh toán</th>
          <th scope="col">Tài khoản ADMIN</th>
          <th scope="col">Mật khẩu ADMIN</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Gia hạn</th>
      </tr>
  </thead>
  <tbody>

    <?php
    $query = mysqli_query($connect, "SELECT * FROM taoweb WHERE uid = '".$user['id']."' ORDER BY id DESC");
    while($row = mysqli_fetch_assoc($query)){
        ?>
        <tr>
          <th scope="row"><?php echo $row['id']; ?></th>
          <td><?php echo $row['domain']; ?></td>
          <td><a href="/sharecode/tao-web/<?php echo $row['id_code']; ?>"><button class="btn btn-sm btn-info">XEM</button></a></td>
          <td><?php echo $row['time2']; ?></td>
          <td><?php echo date('d/m/Y - H:i:s', $row['time1'] + (2592000 * $row['thanhtoan']) ); ?></td>
          <td><?php echo $row['thanhtoan']; ?> Tháng</td>
          <td><?php echo $row['taikhoanadmin']; ?></td>
          <td><?php echo $row['matkhauadmin']; ?></td>
          <td>
            <?php
            if( ( $row['time1'] + (2592000 * $row['thanhtoan']) ) >= time() ){
                 echo trangthai_taoweb($row['trangthai']); 
            } else {
                echo 'Hết hạn';
            }
            ?>                
           </td>
          <td><a href="/sharecode/gia-han/taoweb/<?php echo $row['id']; ?>"><button class="btn btn-sm btn-danger">Gia hạn</button></a></td>
      </tr>
      <?php
  }
  ?>

</tbody>
</table>

</div>

<?php
require_once __DIR__."/../../theme/footer.php";
?>