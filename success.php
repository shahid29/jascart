<?php include 'inc/header.php' ;?>
<?php 
    $login =  Session::get("cuslogin");
    if ($login==false) {
        header("Location:login.php");
    }
?>


<style>
	.psuccess{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd; margin: 0 auto;padding: 20px}
    .psuccess h2{border-bottom: 1px solid #ddd;margin-bottom: 20px;padding-bottom: 10px}
    .psuccess p{line-height: 25px;font-size: 18px;text-align: left}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="psuccess">
                <h2>Success</h2>
                <?php
                     $cmrId = Session::get("cmrId");
                     $payAmount = $ct->payableAmount($cmrId);
                    
                     if ($payAmount) {
                            $sum = 0;
                             while ($result=$payAmount->fetch_assoc()){

                                    $price = $result['price'];
                                  
                                    $sum = $sum+$price;

                                }}

                       
                ?>
                    <p style='color:red'>Total Payable Amount (Including Vat) : BDT. 
                    <?php 

                         $v=0.1;           
                         $vat=$sum * $v;
                         $total=$vat + $sum;
                         
                         echo $total;
                         ?>  </p>  
                       
                    <p>Thanks for Purchase. Receive Your Order Successfully. We will Contact You ASAP With Delivery Details. Here is Your Order Details...<a href="orderdetails.php">Visit Here...</a></p>
                    
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