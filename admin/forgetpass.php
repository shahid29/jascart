<?php include '../classes/Adminlogin.php';?>


<?php

$al= new Adminlogin();
 
 if ($_SERVER['REQUEST_METHOD']=='POST') {

 	$adminEmail=$_POST['adminEmail'];
 	
 	$loginChk=$al->forgetpass($adminEmail);
 }

?>
<style>
	.success{color:green;}
</style>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title> Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="POST">
			<h1>Password Recovery</h1>
				<span style="color:red;font-size:18px;">
					<?php
						if (isset($loginChk)) {
							echo $loginChk;
							
						}

					?>

				</span>

			<div>
				<input type="text" placeholder="Enter Email"  name="adminEmail"/>
			</div>
			
			<div>
				<input type="submit" value="Send" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">JAS-CART</a>
		</div>
	</section><!-- content -->
</div><!-- container -->
</body>
</html>