<?php include 'inc/header.php' ;?>
<?php 
    $login =  Session::get("cuslogin");
    if ($login==false) {
        header("Location:loginforbuying.php");
    }
    
?>


<style>
	.payment{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd; margin: 0 auto;padding: 50px}
    .payment h2{border-bottom: 1px solid #ddd;margin-bottom: 40px;padding-bottom: 10px}
    .payment a{background: #ff0000 none repeat scroll 0 0;border-radius: 3px ;color:#fff;font-size: 25px; padding: 5px 30px }
    .back a{width: 160px ;margin: 5px auto 0;padding: 7px 0;display: block;text-align: center;background: #555 ;border: 1px solid #333; color:#fff ; border-radius: 3px;font-size: 25px}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="payment">
                <h2>Choose Payment Option</h2>
                <a href="PaymentOffline.php">Offline Payment</a>
                <a href="#">Online Payment</a>
            </div>
    		  <div class="back">
                <a href="cart.php">Previous</a>      
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