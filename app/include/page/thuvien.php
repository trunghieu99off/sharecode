
 <?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

if(!isset($_SESSION['user'])){
	header('location: /sharecode');
}
$idu = $user['id'];
$sqlt="SELECT count(id) as ss FROM manguon WHERE iduserupdate =$idu";
$countmn = mysqli_fetch_array(mysqli_query($connect, $sqlt));
?>
<div class="container" style="margin-top: 65px;">
	
			<!-- 	<h2 class="mb-4 text-uppercase font-weight-light text-info">ĐỔI MẬT KHẨU</h2> -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Code Đã Đăng ( <?php echo $countmn['ss'] ?> )</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Code Đã Mua</button>
   <button class="tablinks"><a href="/sharecode/useraddcode">Thêm Code Mới</a></button>
</div>
<?php 

$sql = "SELECT manguon.*,ngonngu.name as namecate,theloai.name as nametheloai ,nhomcode.name as namenhomcode FROM manguon 
LEFT JOIN ngonngu on ngonngu.id = manguon.idngonngu 
LEFT JOIN theloai ON theloai.id = manguon.idtheloai 
LEFT JOIN nhomcode ON nhomcode.id =manguon.idnhomcode 
WHERE manguon.iduserupdate= $idu";
$chitietsc =mysqli_query($connect, $sql);?>
<div id="London" class="tabcontent" style="width: 1420px;margin-left: -135px;">
	<table class="table">
                <thead>
                  <tr>

                    <th> ID </th>
                    <th>Tên</th>
                    <th>Ngôn Ngữ</th>
                    <th>Thể Loại</th>                     
                    <th>Nhóm Code</th>
                    <th>Ngày Đăng</th>
                    <th>Giá</th>
                    <th>Lượt Xem</th>
                    <th>Lượt Tải</th>
                    <th>Trạng Thái</th>
                  </tr>
                </thead>
           <?php while($row = mysqli_fetch_assoc($chitietsc)){
         ?>
                <tbody>
                	<th><?php echo $row['id']; ?></th>
                	<th><?php echo $row['name']; ?></th>
                	<th><?php echo $row['namecate']; ?></th>
                	<th><?php echo $row['nametheloai']; ?></th>
                	<th><?php echo $row['namenhomcode']; ?></th>
                	<th><?php echo $row['created']; ?></th>
                	<th><?php echo $row['price']; ?></th>
                	<th><?php echo $row['luotxem']; ?></th>
                	<th><?php echo $row['luottai']; ?></th>
                	<th><?php echo $row['trangthai']; ?></th>
               <?php } ?>

                </tbody>
              </table>
</div>
<div id="Tokyo" class="tabcontent">
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
			</div>
<?php
require_once __DIR__."/../../theme/footer.php";
?>
<style type="text/css">
	.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}
.tab button:hover {
  background-color: #ddd;
}
.tab button.active {
  background-color: #ccc;
}
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
</style>
<script type="text/javascript">
	document.getElementById("defaultOpen").click();
	function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
</script>