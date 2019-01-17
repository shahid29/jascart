<?php include 'inc/header.php' ;?>
<?php 
	$login =  Session::get("cuslogin");
	if ($login==true) {
		header("Location:cart.php");
	}
?>

<!--ustomer Login-->
    <?php 
    
     if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) {
         $customerLog=$cmr->customerLogin($_POST);
 		}

	?>


 <div class="main">
    <div class="content">
    	 <div class="login_panel">
    	 	<?php
    			if (isset($customerLog)) {
    				echo $customerLog;
    			}
    		?>
        	<h3 style="color:red">You Have to Must Login For Buying Products</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="POST">
                	<input name="email/phone" placeholder="Enter E-mail or Phone Number" type="text" />
                    <input name="pass" placeholder="Enter Your Password" type="password" />
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                    	<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    </div>

                 </form>

<!--ustomer Login End-->         
                
                   
    	
<!--ustomer Registration --> 
    <?php 
    
     if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
         $customerReg=$cmr->customerRegistration($_POST);
 		}

	?>


    	<div class="register_account">
    		<?php
    			if (isset($customerReg)) {
    				echo $customerReg;
    			}
    		?>
    		<h3>Register New Account</h3>
    		<form action="" method="POST" >
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter Your Name" />
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City" />
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code" />
							</div>
							<div>
								<input type="text" name="email" placeholder="E-mail" />
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address" />
						</div>
		    		<div>
							<input type="text" name="country" placeholder="Country" />
						</div>
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone" />
		          </div>
				  
				  <div>
					<input type="text" name="pass" placeholder="Password" />
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register" >Create Account</button></div></div>

<!--ustomer Registration End--> 
		   
		    <div class="clear"></div>
		    </form>
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