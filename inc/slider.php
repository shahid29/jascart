
<style>

	.categorycontent h2{font-size: 23px;
			padding-top: 5px;
			text-align: center;
			display: block;
			background-color: purple;
			color: white;
			border: 3px solid gray;
			border-radius: 4px;}
			.categorycontent{}
			
				

</style>
<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">

			<?php
				$getApple=$pd->latestFromApple();
				if ($getApple) {
					while ($result=$getApple->fetch_assoc()) {
				
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Apple</h2>
						<p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>">Details</a></span></div>
				   </div>
				   
			   </div>

			<?php } }?>  





			<?php
				$getSamsung=$pd->latestFromSamsung();
				if ($getSamsung) {
					while ($result=$getSamsung->fetch_assoc()) {
				
			?> 

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						 <p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>">Details</a></span></div>
					</div>
				</div>

			<?php } }?> 


			</div>
			<div class="section group">


			<?php
				$getIshin=$pd->latestFromIshin();
				if ($getIshin) {
					while ($result=$getIshin->fetch_assoc()) {
				
			?> 
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Ishin</h2>
						 <p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>">Details</a></span></div>
				   </div>
			   </div>	

			   <?php } }?> 


			   <?php
				$getWrangler=$pd->latestFromWrangler();
				if ($getWrangler) {
					while ($result=$getWrangler->fetch_assoc()) {
				
			?> 

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						   <a href="details.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Wrangler</h2>
						  <p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>">Details</a></span></div>
					</div>
				</div>
			 <?php } }?> 	
			</div>

			<div class="section group">


			<?php
				$getSukkhi=$pd->latestFromSukkhi();
				if ($getSukkhi) {
					while ($result=$getSukkhi->fetch_assoc()) {
				
			?> 
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Sukkhi Zinc</h2>
						 <p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>">Details</a></span></div>
				   </div>
			   </div>	

			   <?php } }?> 


			   
			</div>




		







		  <div class="clear"></div>
		</div>
	
			<div class="categorycontent">
			 <div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php
							$getCat=$cat->getAllCat();
							if ($getCat) {
									while ($result=$getCat->fetch_assoc()) {
									
						?>
				      <li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
				     <?php } } ?>
    				</ul>

    				</br>
    				
    				<h2>BRAND NAME</h2>
    				<ul>
						<?php
						$brand = new Brand();
							$getBrand=$brand->getAllBrand();
							if ($getBrand) {
									while ($result=$getBrand->fetch_assoc()) {
									
						?>
				      <li><a href="productbybrand.php?brandId=<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></a></li>
				     <?php } } ?>
    				</ul>
    			</div>
 			</div>
	  <div class="clear"></div>
  </div>	
