<?php include 'inc/header.php' ;?>
<?php 
    $login =  Session::get("cuslogin");
    if ($login==false) {
        header("Location:index.php");
    }
?>

<?php
    if (isset($_GET['orderid']) && $_GET['orderid']=='order') {
         $cmrId =  Session::get("cmrId");
         $insertOrder =$ct->orderProduct($cmrId);
         $delData = $ct->delCustomerCart();
         header("Location:success.php");
    }
?>


<style>
    .division{width: 50%;float: left; }
	.tblone{width: 446px;margin: 0 auto; border: 2px solid #ddd}
    .tblone tr td{text-align: justify;}
    .tbltwo{float:right;text-align:left;width: 61%;border: 2px solid #ddd;margin-right: 14px;margin-top: 12px}
     .tbltwo tr td{text-align: justify;padding: 5px 10px}
     .ordernow{padding-bottom: 30px}
     .ordernow a{width: 200px;margin: 20px auto 0;padding:5px;text-align: center;display: block;font-size: 30px;background: #ff0000;border-radius: 3px;color: #fff }
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
		  <div class="division">
              <table class="tblone">
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        <?php 
                            $getPro= $ct->getCartProduct();
                            if ($getPro) {
                                $i=0;
                                $sum=0;
                                $qty=0;
                                    while ($result=$getPro->fetch_assoc()) {
                                        $i++;
                                    
                        ?>  
                            <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $result['productName'] ;?></td>
                        <td>BDT.<?php echo $result['price'] ;?></td>
                        <td style="text-align:center"> <?php echo $result['quantity'] ;?></td>
                        <td> <?php 
                                    $total = $result['price']*$result['quantity'];  
                                    echo $total ;?></td>
                                
                            </tr>
                        <?php 
                            $qty = $qty + $result['quantity'];
                            $sum = $sum + $total;
                        
                        ?>  
                    <?php } }?> 
                        </table>
                       

                        <table class="tbltwo">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td>BDT. <?php echo $sum ;?></td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td>:</td>
                                <td>10% (BDT. <?php echo $vat= $sum*0.1;?>)</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>:</td>
                                <td>BDT. 
                                    <?php
                                        $vat= $sum*0.1;
                                        $gtotal = $sum + $vat;
                                        echo $gtotal;
                                    ?> 
                                </td>   
                            </tr>
                             <tr>
                                <td>Quantity</td>
                                <td>:</td>
                                <td><?php echo $qty;?></td>
                            </tr>
                       </table>
                      
          </div>
           <div class="division">
               <?php
                $id= Session::get("cmrId");
                $getData = $cmr->getCustomerData($id);
                if ($getData) {
                    while ($result=$getData->fetch_assoc()) {
                        
                    ?>
           <table class="tblone">
                <tr>
                    <td colspan="3">
                <h2 style="text-align:justify; ;color:green">Your Profile Details</h2>
                    </td>
                </tr>
                <tr>
                    <td width="20%">Name</td>
                    <td width="5%">:</td>
                    <td><?php echo $result['name'];?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><?php echo $result['phone'];?></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td><?php echo $result['email'];?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><?php echo $result['address'];?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>:</td>
                    <td><?php echo $result['city'];?></td>
                </tr>
                <tr>
                    <td>Zip-Code</td>
                    <td>:</td>
                    <td><?php echo $result['zip'];?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>:</td>
                    <td><?php echo $result['country'];?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="editprofile.php">Update Details</a></td>
                </tr>
            </table>
        <?php } }?> 
           </div>
 		</div>
 	</div>
      <div class="ordernow">
        <a href="?orderid=order">Click for Order</a>
        
    </div>
</div>

   <?php
    $login =  Session::get("cuslogin");
            if ($login==true){?> 
 <?php include 'inc/footer.php' ;?>
<?php }else{?>
<?php include 'inc/footerwithoutlogin.php' ;?>
<?php }?>