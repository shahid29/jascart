<?php include 'inc/header.php' ;?>
<?php
	if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
        echo "<script>window.location='404.php';</script>";
    }else{
        
        $id= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['brandId']);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<?php 
    		$brand = new Brand();
					$getBrand=$brand->getBrandById($id); 
					if ($getBrand) {
						while ($result=$getBrand->fetch_assoc()) {
					
				?>
    		<h3><?php echo $result['brandName'];?></h3>
    <?php	}}?>

    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      <?php
	      		$productbybrand=$pd->productByBrand($id);
	      		if ($productbybrand) {
	      				while ($result=$productbybrand->fetch_assoc()) {
	      				
	      ?>
	      			<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productID'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					<h2><?php echo $result['productName'];?></h2>
					<p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">BDT. <?php echo $result['price'];?></span></p>
				      <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
		<?php } }else{
			
			header("location:404.php");
			//echo "<p>Products of this category are not available</p>";
		}
		?>	
				
			</div>

	
    		<h3 style="color:red; text-align:center">No More Product of this Brand</h3>
    		
	
    </div>
 </div>
 

 <?php
 	$login =  Session::get("cuslogin");
			if ($login==true){?> 
 <?php include 'inc/footer.php' ;?>
<?php }else{?>
<?php include 'inc/footerwithoutlogin.php' ;?>
<?php }?>