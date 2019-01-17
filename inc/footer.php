
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Site Menu</h4>
						<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="topbrands.php"><span>Top Brands</span></a></li>
						<li><a href="login.php">SignUp</a></li>
						<li><a href="contact.php"><span>Contact Us</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Categories</h4>
						<ul>
						<?php
							$getCat=$cat->getAllCat();
							if ($getCat) {
									while ($result=$getCat->fetch_assoc()) {
									
						?>
				      <li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
				     <?php } } ?>
    				</ul>
				</div>
			<?php
			$login =  Session::get("cuslogin");
			if ($login==true) {?>	
				<div class="col_1_of_4 span_1_of_4">
			
						
					<h4>My account</h4>
						<ul>
							<li><a href="profile.php">Profile</a></li>
							<li><a href="editprofile.php">Update Profile</a></li>
							<li><a href="wishlist.php">My Wishlist</a></li>
							<li><a href="contact.php">Help</a></li>
							<li><a href="?cid=<?php Session::get('cmrId')?>">Logout</a></li>

						</ul>
						</div>
			<?php }?>

				

				<div class="col_1_of_4 span_1_of_4">
		<?php 
        $query="SELECT * FROM tbl_contactNumber WHERE id='1'";
        $getNumber=$db->select($query);
        if ($getNumber) {
            while ($result=$getNumber->fetch_assoc()) {
       
    ?>
					<h4>Contact</h4>
						<ul>
							<li><span><?php echo $result['num1'];?></span></li>
							<li><span><?php echo $result['num2'];?></span></li>
						</ul>
						<div class="social-icons">
						<?php 
        $query="SELECT * FROM tbl_social WHERE id='1'";
        $getSocial=$db->select($query);
        if ($getSocial) {
            while ($result=$getSocial->fetch_assoc()) {
       
    ?>
							<h4>Follow Us</h4>

					   		  <ul>
							      <li class="facebook"><a href="<?php echo $result['fb'];?>" target="_blank"> </a></li>
							      <li class="twitter"><a href="<?php echo $result['tw'];?>" target="_blank"> </a></li>
							      <li class="googleplus"><a href="<?php echo $result['gp'];?>" target="_blank"> </a></li>
							      
							      <div class="clear"></div>
						     </ul>
					<?php } }?>	 

   	 					</div>
   	 			<?php } }?>	 
				</div>
			</div>
			<div class="copy_right">
			<?php
            $db = new Database();
            $query=" SELECT * FROM tbl_copyright WHERE id='1' ";
            $copyrighttext = $db->select($query);
            if ($copyrighttext) {
                while ($result= $copyrighttext->fetch_assoc()) {
                    
          
        ?>
				<p> &copy;<?php echo $result['note'];?><?php echo date(' Y');?></p>
			<?php }} ?>	
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
	  
</body>
</html>
