<?php include 'inc/header.php' ;?>
<?php include 'inc/slider.php' ;?>

<style>
	
</style>
	
 <div class="main">
    <div class="content">
    	<div class="content_top">

	<div class="heading">
    		<h3>Latest Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	     	
	      	<?php
	      		$getFpd = $pd->getFeaturedProduct();
	      		if ($getFpd) {
	      				while ($result=$getFpd->fetch_assoc()) {
	      	?>
	      	<div>
				<div class="grid_1_of_4 images_1_of_4">
				
					 <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">BDT. <?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
			</div>
				
			<?php } } ?>	
			
			</div>
			
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">

	      	<?php
	      		$getNpd = $pd->getNewProduct();
	      		if ($getNpd) {
	      				while ($result=$getNpd->fetch_assoc()) {
	      	?>	
	      	<div>
				<div class="grid_1_of_4 images_1_of_4">
				
					  <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><span class="price">BDT. <?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
			</div>	
			<?php } } ?>		
				
			</div>
    </div>
 </div>
 <?php
 	$login =  Session::get("cuslogin");
			if ($login==true){?> 
 <?php include 'inc/footer.php' ;?>
<?php }else{?>
<?php include 'inc/footerwithoutlogin.php' ;?>
<?php }?>
