<?php include 'inc/header.php' ;?>


 <div class="main">
    <div class="content">
    	<div class="content_bottom">
    		<div class="heading">
    		<h3><a href="productbybrand.php?brandId=1">Apple</a></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">


			<?php
				$getAcer=$pd->brandFromApple();
				if ($getAcer) {
					while ($result=$getAcer->fetch_assoc()) {
				
			?> <div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">BDT. <?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>

			   <?php } }?> 


			</div>	


		<div class="content_bottom">
    		<div class="heading">
    		<h3><a href="productbybrand.php?brandId=9">Samsung</a></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			 <div class="section group">


			<?php
				$getAcer=$pd->brandFromSamsung();
				if ($getAcer) {
					while ($result=$getAcer->fetch_assoc()) {
				
			?> <div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">BDT. <?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>

			   <?php } }?> 


			</div>	


	<div class="content_bottom">
    		<div class="heading">
    		<h3><a href="productbybrand.php?brandId=2">Ishin</a></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">


			<?php
				$getAcer=$pd->brandFromIshin();
				if ($getAcer) {
					while ($result=$getAcer->fetch_assoc()) {
				
			?> <div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">BDT. <?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>

			   <?php } }?> 


			</div>	

	<div class="content_bottom">
    		<div class="heading">
    		<h3><a href="productbybrand.php?brandId=3">Wrangler</a></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">


			<?php
				$getAcer=$pd->brandFromWrangler();
				if ($getAcer) {
					while ($result=$getAcer->fetch_assoc()) {
				
			?> <div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">BDT. <?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>

			   <?php } }?> 


			</div>	
	<div class="content_bottom">
    		<div class="heading">
    		<h3><a href="productbybrand.php?brandId=8">Sukkhi Zinc</a></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">


			<?php
				$getAcer=$pd->brandFromSukkhi();
				if ($getAcer) {
					while ($result=$getAcer->fetch_assoc()) {
				
			?> <div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">BDT. <?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>

			   <?php } }?> 


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