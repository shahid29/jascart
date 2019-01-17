<?php include 'inc/header.php' ;?>
<?php include_once ($filepath.'/../lib/PHPMailer/PHPMailerAutoload.php');?>
<?php 
	$login =  Session::get("cuslogin");
	if ($login==true) {
		header("Location:index.php");
	}
?>


<!--ustomer Login-->
 <?php   
 if ($_SERVER['REQUEST_METHOD']=='POST') {

 	$email=$_POST['email'];
 	
 	$Chkemail=$cmr->userPassRecovey($email);
 }
?>
<style>
	.content {margin-left: 35%;width: 100%;}
	.send {border-radius: 3px;margin-top: 5%;}
</style>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
    	 	<?php
    			if (isset($Chkemail)) {
    				echo $Chkemail;
    			}
    		?>
        	<h3>Recovery Password</h3>
        	<p>Please Enter Your Valid Email</p>
        	
        	<form action="forgetuserpass.php" method="POST">
                	<input name="email" placeholder="Enter E-mail" type="text" />
                    <div class="send">
                    <div class="buttons"><div><button class="grey" name="send">Send</button></div></div>
                   </div>

                 </form>


		   
		    <div class="clear"></div>
		 
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
    $login =  Session::get("cuslogin");
            if ($login==true){?> 
 <?php include 'inc/footer.php' ;?>
<?php }else{?>
<?php include 'inc/footerwithoutlogin.php' ;?>
<?php }?>