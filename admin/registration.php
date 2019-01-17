<?php include '../classes/Adminlogin.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/../lib/Session.php');
		Session::checkLogin(); ?>

 <?php 
 $al= new Adminlogin();
    
     if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
         $adminReg=$al->adminRegistration($_POST);
 		}

	?>




<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title> JAS-CART Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
	<div class="container">
	<section id="content">
		<form action="registration.php" method="POST">
			<h1>Admin Registration</h1>
				<span style="color:red;font-size:18px;">
					<?php
						if (isset($adminReg)) {
							echo $adminReg;
							
						}

					?>
				</span>

			<div>
				<input type="text" placeholder="Name"  name="adminName"/>
			</div>	
			<div>
				<input type="text" placeholder="Username"  name="adminUser"/>
			</div>
			<div>
				<input type="text" placeholder="Email"  name="adminEmail"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="adminPass"/>
			</div>
			<div>
				<input type="password" placeholder="Confirm Password"  name="adminConPass"/>
			</div>
			<div>
				<input type="submit" value="Send" name="register" />
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