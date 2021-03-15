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
        <th scope="col">Loại CODE</th>
        <th scope="col">Ngày mua</th>
        <th scope="col">Link Download</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $query = mysqli_query($connect, "SELECT * FROM lichsu_muasourcecode WHERE uid = '".$user['id']."' ORDER BY id DESC");


      while($row = mysqli_fetch_assoc($query)){
        ?>
        <tr>
          <th scope="row"><?php echo $row['id']; ?></th>
          <td><a href="/sharecode/mua-source-dh/<?php echo $row['id_code']; ?>"><button class="btn btn-sm btn-info">Xem</button></a></td>
          <td><?php echo $row['time']; ?></td>

          <?php
          $info_source = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM danhsachcode1 WHERE id = '".$row['id_code']."'"));
          ?>

          <td><a target="_bank" href="<?php echo $info_source['download']; ?>"><button class="btn btn-sm btn-danger">Download</button></a></td>
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