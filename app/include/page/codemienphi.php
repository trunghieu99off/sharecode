<?php
require_once"autoload/autoload.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";
  $open = "manguon";
   $sql = "SELECT manguon.*,ngonngu.name as namecate FROM manguon
    LEFT JOIN ngonngu on ngonngu.id = manguon.idngonngu ORDER BY created DESC"; 
      $manguon =$db->fetchJone('manguon',$sql,100,true);
      $banner=$db->fetchAll('bannerQC');
?>                     
         <div class="container mb-3" style="margin-top: 65px;">
<style type="text/css">
	.viewspan{
		margin-left: -45px;

	}
	.viewdow{
		margin-right: -45px;
	}
</style>
 <h1 class="page-heading">
                                <span class="page-heading-title" style="border-bottom: 3px solid #17a2b8 !important;">CODE CHẤT LƯỢNG</span>
                            </h1>
	<div class="row">

 <?php foreach ($manguon as $item): ?>
 	<?php if($item['price']==0){?>
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
<?php } ?>
	<?php endforeach ?>
</div>
	
					
</div>

<?php
require_once __DIR__."/../../theme/footer.php";
?>