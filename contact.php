<?php 

include 'inc/header.php'; 
		
    
?>



<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$name=$fm->validation($_POST['name']);
	$email=$fm->validation($_POST['email']);
	$phone=$fm->validation($_POST['phone']);
	$body=$fm->validation($_POST['body']);

	$name =mysqli_real_escape_string($db->link,$name);
	$email =mysqli_real_escape_string($db->link,$email);
	$phone =mysqli_real_escape_string($db->link,$phone);
	$body =mysqli_real_escape_string($db->link,$body);

	
	if (empty($name)) {
		$error="Name Must Not be Empty";
	}elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		$error="Invalid Name. Only letters and white space allowed";
	}
	elseif (empty($email)) {
		$error="Email Must Not be Empty";
	}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error="Invalid Email Address";
	}elseif (empty($phone)) {
		$error="Phone Must Not be Empty";
	}elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
		$error="Only Digit Allowed & Phone Number Must be 11 Digit";
	}elseif (empty($body)) {
		$error="Text Area Must Not be Empty";
	}else{
		$query="INSERT INTO tbl_contact(name,email,phone,body) VALUES('$name','$email','$phone','$body')";
		$inserted_row=$db->insert($query);
		if ($inserted_row) {
			$msg="Mesage Sent Successfully";
			
		
			}else{
				$error="Mesage Not Sent !";

					
		}

	}

}

?>
 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
				  	<?php
				  		if (isset($error)) {
				  			echo "<span style ='color:red'>$error </span>";
				  		}
				  		if (isset($msg)) {
				  			echo "<span style ='color:green'>$msg </span>";
				  		}
				  	?>

					    <form action="contact.php" method="POST" >
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" name="name" placeholder="Enter Your Name"  ></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" name="email" placeholder="Enter Your E-Mail" ></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" name ="phone" placeholder="Enter Your Pnone Number" ></span>
						    </div>
						    <div>
						    	<span><label>Message</label></span>
						    	<span><textarea name ="body"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="Send"></span>
						  </div>
					    </form>

				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
      						<div>

		<?php 
        $query="SELECT * FROM tbl_contactNumber WHERE id='1'";
        $getNumber=$db->select($query);
        if ($getNumber) {
            while ($result=$getNumber->fetch_assoc()) {
       
    ?>
				     	<h2>Company Information :</h2>
						    	<p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>USA</p>
				   		<p>Phone:<?php echo $result['num1'];?></p>
				   		<p>Mobile:<?php echo $result['num2'];?></p>
				   		<?php }}?>
				   		</div>
				 	 	<p>Email: <span>jas-cart@mycompany.com</span></p>
				   		<p>
				   			<?php 
        $query="SELECT * FROM tbl_social WHERE id='1'";
        $getSocial=$db->select($query);
        if ($getSocial) {
            while ($result=$getSocial->fetch_assoc()) {
       
    ?>		
				   		Follow on: <span><a href="<?php echo $result['fb'];?>">Facebook</a></span>, <span><a href="<?php echo $result['tw'];?>">Twitter</a></span>, <span><a href="<?php echo $result['gp'];?>">Google+</a></span>
				   		<?php }}?>
				   		</p>
				   		
				   </div>
				 </div>
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