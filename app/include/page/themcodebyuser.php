 <?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

if(!isset($_SESSION['user'])){
	header('location: /sharecode');
}
 if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $data = 
        [
            "name" => postInput('name'),
            "idngonngu" => postInput('ngonngu'),
            "idtheloai" => postInput('theloai'),
            "idnhomcode" => postInput('nhomcode'),
              "linkdownload" => postInput('download'),
                "noidung" => postInput('mota'),
                  "price" => postInput('phitai'),
                  "iduserupdate"=>$user['id']

        ];
        $error = [];
        if(postInput('name')==''){
             $error['name']="Mời bạn nhập tên !!!!";
        }
        if( ! isset($_FILES['thumbnail'])){
                $error['thumbnail']="Mời thêm hình ảnh cho SP !!!!";
            }
        if(postInput('ngonngu')==''){
           $error['ngonngu']="Mời bạn chọn !!!!";
        }
        if(postInput('theloai')==''){
           $error['theloai']="Mời bạn chọn !!!!";
        }
        if(postInput('nhomcode')==''){
         $error['nhomcode']="Mời bạn chọn !!!!";
        }
        if(postInput('download')==''){
          $error['download']="Mời bạn nhập !!!!";
        }
        if(postInput('mota')==''){
          $error['mota']="Mời bạn nhập  !!!!";
        }
        if(postInput('phitai')==''){
          $error['phitai']="Mời bạn nhập tên !!!!";
        }
        if(empty($error)){
          if(isset($_FILES['thumbnail'])){
                $file_name = $_FILES['thumbnail']['name'];
                $file_tmp =$_FILES['thumbnail']['tmp_name'];
                $file_type =$_FILES['thumbnail']['type'];
                $file_error = $_FILES['thumbnail']['error'];
                if($file_error==0){
                    $part = ROOT."manguon/";
                    $data['thunb'] = $file_name;  
                }
              }
          $id_insert =$db->insert("manguon",$data);
             if($id_insert){
                   move_uploaded_file($file_tmp,$part.$file_name);
                   $err = 'Thêm source code thành công!';
                    echo '<script>swal("Thông báo", "'.$err.'", "success");</script>';
             }else{
                $err = 'Vui lòng nhập đầy đủ thông tin!';
          echo '<script>swal("Thông báo", "'.$err.'", "error");</script>';
             }
        }
      
}
?>
<div class="container" style="margin-top: 65px;">
<h2><a href="http://localhost/sharecode/thu-vien"><< Quay về thư viện</a></h2>
    <div class="row">
      <div class="col-md-1"></div>
      
      <div class="col-md-10 grid-margin stretch-card py-4">
        <div class="card">
          <div class="card-body">
            <h1 class="title3 bold text-center up-title">UPLOAD CODE CHIA SẺ &amp; KIẾM TIỀN CÙNG CHÚNG TÔI</h1>
            <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
            	<div class="form-group">
                <label  class="col-md-2 control-label bold" for="exampleInputUsername1">Tiêu đề</label>
                <input type="text" name="name" class="form-control mb-3" id="exampleInputUsername1" placeholder="Tên">
                <?php if (isset($error['name'])): ?>
                                    <p class="text-danger"><?php echo $error['name'] ?></p>       
                                <?php endif ?>
              </div>
              <div class="form-group">
                <label  class="col-md-2 control-label bold"  for="exampleInputPassword1">Ảnh đại diện</label>
                 <input type="file" class="form-control" id="inputname" name="thumbnail">
                <?php if (isset($error['thumbnail'])): ?>
                                    <p class="text-danger"><?php echo $error['thumbnail'] ?></p>       
                                <?php endif ?>
              </div>
              <div class="form-group">
                <label  class="col-md-2 control-label bold"  for="exampleFormControlSelect1">Chọn ngôn ngữ</label>
                <select class="form-control" id="exampleFormControlSelect1" name="ngonngu">
                   <option value="">Chọn ngôn ngữ</option>
                  <?php
                  $result = mysqli_query($connect, "SELECT * FROM ngonngu");
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php
                  }
                  ?>
                </select>
                <?php if (isset($error['ngonngu'])): ?>
                                    <p class="text-danger"><?php echo $error['ngonngu'] ?></p>       
                                <?php endif ?>
              </div>
              <div class="form-group">
                <label  class="col-md-2 control-label bold"  for="exampleFormControlSelect1">Chọn thể loại</label>
                <select class="form-control" id="exampleFormControlSelect1" name="theloai">
                   <option value="">Chọn thể loại</option>
                  <?php
                  $result = mysqli_query($connect, "SELECT * FROM theloai");
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php
                  }
                  ?>
                </select>
                <?php if (isset($error['theloai'])): ?>
                                    <p class="text-danger"><?php echo $error['theloai'] ?></p>       
                                <?php endif ?>
              </div>
              <div class="form-group">
                <label  class="col-md-2 control-label bold"  for="exampleFormControlSelect1">Chọn nhóm code</label>
                <select class="form-control" id="exampleFormControlSelect1" name="nhomcode">
                   <option value="">Chọn nhóm code</option>
                  <?php
                  $result = mysqli_query($connect, "SELECT * FROM nhomcode");
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php
                  }
                  ?>
                </select>
                <?php if (isset($error['nhomcode'])): ?>
                                    <p class="text-danger"><?php echo $error['nhomcode'] ?></p>       
                                <?php endif ?>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label bold" for="exampleInputUsername1">Link Code</label>
                <input type="text" name="download" class="form-control mb-3" id="exampleInputUsername1" placeholder="Link Download">
                <?php if (isset($error['download'])): ?>
                                    <p class="text-danger"><?php echo $error['download'] ?></p>       
                                <?php endif ?>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label bold"  for="exampleInputEmail1">Mô tả</label>
                <input type="text" name="mota" class="form-control mb-3" id="exampleInputEmail1" placeholder="Mô tả">
                <?php if (isset($error['mota'])): ?>
                                    <p class="text-danger"><?php echo $error['mota'] ?></p>       
                                <?php endif ?>
              </div>
              


              <div class="form-group">
                <label class="col-md-2 control-label bold"  for="exampleInputPassword1">Phí tải</label>
                <input type="text" name="phitai" class="form-control mb-3" id="exampleInputPassword1" placeholder="Giá">
                <?php if (isset($error['phitai'])): ?>
                                    <p class="text-danger"><?php echo $error['phitai'] ?></p>       
                                <?php endif ?>
              </div>
               <div class="form-group" align="center">
                <button type="submit" name="submit" class="btn btn-primary mr-2">Thêm</button></div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-1"></div>
</div>

<?php
require_once __DIR__."/../../theme/footer.php";
?>