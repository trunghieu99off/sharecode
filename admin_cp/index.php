<?php
require_once "include/core/database.php";
require_once "include/theme/head.php";
require_once "include/theme/header.php";

$tonguser = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user"));
$tienthuduoctrongnam  = 0;
$tongtien = 0;
$tientaoweb = 0;
$tienmuasource = 0;
$doanhthuhomnay = 0;
$cacwebdatao = 0;
$cacwebdangchay = 0;
$sourcedamua = 0;

$time2 = explode('/', $time);
$doanhthu = 0;
$doanhthuthangtruoc = 0;
$result = mysqli_query($connect, "SELECT * FROM napthe WHERE trangthai = 2");
while($row = mysqli_fetch_assoc($result)){
  $timez = explode('/', $row['time']);
  if( ($timez[1] == $time2[1]) && ($timez[2] == $time2[2]) ){
    $doanhthu = $doanhthu + $row['menhgia'];
  }
    if( ($timez[1] == $time2[1] - 1) && ($timez[2] == $time2[2]) ){
    $doanhthuthangtruoc = $doanhthuthangtruoc + $row['menhgia'];
  }
   if($timez[2] == $time2[2] ){
      $tienthuduoctrongnam = $tienthuduoctrongnam + $row['menhgia'];
  }
    if( ($timez[0] == $time2[0]) && ($timez[1] == $time2[1]) && ($timez[2] == $time2[2]) ){
    $doanhthuhomnay = $doanhthuhomnay + $row['menhgia'];
  }
 
  
  $tongtien = $tongtien + $row['menhgia'];
} 


$result = mysqli_query($connect, "SELECT * FROM taoweb");
while($row = mysqli_fetch_assoc($result)){
    
    $cacwebdatao = $cacwebdatao + 1;
    
    
      $timez = explode('/', $row['time']);
      
         if( ( $row['time1'] + (2592000 * $row['thanhtoan']) ) >= time() ){
                
            
    $cacwebdangchay = $cacwebdangchay + 1;
  }
  
}


$result = mysqli_query($connect, "SELECT * FROM lichsu_muasourcecode");
while($row = mysqli_fetch_assoc($result)){
    
    $sourcedamua = $sourcedamua + 1;
    
}

$all_magiamgia = 0;
$magiamgia_true = 0;
$result = mysqli_query($connect, "SELECT * FROM magiamgia");
while($row = mysqli_fetch_assoc($result)){
    
    $all_magiamgia = $all_magiamgia + 1;
    
    if($row['trangthai'] == 'true'){
            $magiamgia_true = $magiamgia_true + 1;
    }
    
}



?>
<!-- partial -->
<div class="main-panel" style="margin-left: -1400px;">
  <div class="content-wrapper">

    <div class="row">
        
        
         
          <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <h4 class="card-title">Danh s??ch ADMIN</h4>
      
        <div class="table-responsive">
         <table class="table mb-3">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Ng??y tham gia</th>

                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                       $result = mysqli_query($connect, "SELECT * FROM user WHERE chucvu = '9'");
                                       
                                       while($row = mysqli_fetch_assoc($result)){
                              ?>
                              
                          <tr>
                         
                           <td><?php echo $row['id']; ?></td>
                            <td class="text-uppercase"><?php echo $row['taikhoan']; ?></td>
                              <td><?php echo $row['time']; ?></td>
                            
                            </tr>
                          
                          
                          <?php
                                       }
                          ?>
                          


                        </tbody>
                        
                      </table>
                      </div>
         
         
        </div>
      </div>
    </div>
    
    
    
        
        
              <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <h4 class="card-title">Th???ng k?? c??ng vi???c</h4>
         
         <div class="table-responsive">
         <table class="table mb-3">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>C??ng vi???c</th>
                            <th>C???n x??? l??</th>
                            <th>Ch???c n??ng</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                          <tr>
                              <?php
                                    $donhang1 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM taoweb WHERE trangthai = '0'"));
                              ?>
                            <td>1</td>
                            <td>????n T???o WEB</td>
                            <td><?php echo $donhang1; ?> ????n h??ng</td>
                                 <td>
                                  <a href="/sharecode/admin_cp/pages/taotrangweb/duyettaoweb.php">
                                      <button class="btn btn-success">??i t???i</button>
                                  </a>
                                  </td>
                          </tr>
                          
                          
                                                      
                          <tr>
                              <?php
                                    $donhang2 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM giahan_web WHERE trangthai = '0'"));
                              ?>
                            <td>2</td>
                            <td>????n Gia H???n WEB</td>
                            <td><?php echo $donhang2; ?> ????n h??ng</td>
                              <td>
                                  <a href="/sharecode/admin_cp/pages/taotrangweb/giahanweb.php">
                                      <button class="btn btn-success">??i t???i</button>
                                  </a>
                                  </td>
                          </tr>

                        </tbody>
                        
                      </table>
                      </div>
                      
                      <p class="">
                           Hi???n t???i c?? <?php echo number_format($donhang1 + $donhang2); ?> vi???c c???n x??? l??.
                      </p>
               
         
        </div>
      </div>
    </div>
    
    
   
        
        
        
        
        
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Th??nh vi??n</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($tonguser); ?></h2>
                  <p class="text-primary ml-2 mb-0 font-weight-medium">Th??nh vi??n</p>
                </div>
                <h6 class="text-muted font-weight-normal">To??n b??? th??nh vi??n</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
           
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>M?? gi???m gi?? ???? t???o</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($all_magiamgia); ?></h2>
                  <p class="text-primary ml-2 mb-0 font-weight-medium">Gifcode</p>
                </div>
                <h6 class="text-muted font-weight-normal">M?? gi???m gi?? ???? t???o</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
           
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>M?? gi???m gi?? c??n d??ng ???????c</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($magiamgia_true); ?></h2>
                  <p class="text-primary ml-2 mb-0 font-weight-medium">Gifcode</p>
                </div>
                <h6 class="text-muted font-weight-normal">???? gi???m gi?? s??? d???ng ???????c</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
           <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>C??c web ???? t???o</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($cacwebdatao); ?></h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">WEB</p>
                </div>
                <h6 class="text-muted font-weight-normal">To??n b??? web user t???o</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
           <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>C??c web ??ang ch???y</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($cacwebdangchay); ?></h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">WEB</p>
                </div>
                <h6 class="text-muted font-weight-normal">C??c web c??n h???n s??? d???ng v?? ??ang ho???t ?????ng</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
               <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      
      
                 <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Source ???? mua</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($sourcedamua); ?></h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Source</p>
                </div>
                <h6 class="text-muted font-weight-normal">Source code m?? user ???? mua</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
   
                  
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Doanh thu h??m nay</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($tongtien); ?></h2>
                  <p class="text-danger ml-2 mb-0 font-weight-medium">VN??</p>
                </div>
                <h6 class="text-muted font-weight-normal">To??n b??? doanh thu h??m nay</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      


      
      


            
      
      
            <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Doanh thu th??ng n???y</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($doanhthu); ?></h2>
                  <p class="text-danger ml-2 mb-0 font-weight-medium">VN??</p>
                </div>
                <h6 class="text-muted font-weight-normal">Doanh thu trong th??ng <?php echo $time2[1]- 1 + 1; ?></h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
               
                  <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
     
       
       
      
            <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Doanh thu th??ng tr?????c</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($doanhthuthangtruoc); ?></h2>
                  <p class="text-danger ml-2 mb-0 font-weight-medium">VN??</p>
                </div>
                <h6 class="text-muted font-weight-normal">Doanh thu trong th??ng <?php echo $time2[1] - 1; ?></h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                 <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
            <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Ti???n thu ???????c trong n??m</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($tienthuduoctrongnam); ?></h2>
                  <p class="text-danger ml-2 mb-0 font-weight-medium">VN??</p>
                </div>
                <h6 class="text-muted font-weight-normal">To??n b??? doanh thu trong n??m</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
  

      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>T???ng s??? ti???n thu ???????c</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0"><?php echo number_format($tongtien); ?></h2>
                  <p class="text-danger ml-2 mb-0 font-weight-medium">VN??</p>
                </div>
                <h6 class="text-muted font-weight-normal">To??n b??? doanh thu khi th??nh l???p</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
  </div>

    <div class="row">







</div>




</div>




</div>



</div>
</div>




<?php
require_once "include/theme/footer.php";
?>