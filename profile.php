<?php include 'inc/header.php' ;?>
<?php 
    $login =  Session::get("cuslogin");
    if ($login==false) {
        header("Location:index.php");
    }
?>


<style>
	.tblone{width: 550px;margin: 0 auto; border: 2px solid #ddd}
	.tblone tr td{text-align: justify;}
    .bottom{margin-left: 35%;width: 100%;padding-bottom: 2%;}
    .send {border-radius: 3px;margin-top: 5%;}
</style>

 <?php  
 $cmrId =  Session::get("cmrId"); 
 if ($_SERVER['REQUEST_METHOD']=='POST') {

    $pass=md5($_POST['pass']);
    $newpass=md5($_POST['newpass']);
    $renewpass=md5($_POST['renewpass']);
    
    $Chkpass=$cmr->userPassChange($pass,$newpass,$renewpass,$cmrId);
 }
?>


 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php
    			$id= Session::get("cmrId");
    			$getData = $cmr->getCustomerData($id);
    			if ($getData) {
    				while ($result=$getData->fetch_assoc()) {
    					
    				?>
    		<table class="tblone">
    			<tr>
    				<td colspan="3">
    			<h2 style="text-align:center ;color:green">Your Profile Details</h2>
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

    <div class="bottom">
         <div class="login_panel">
            
            <h3>Password Change</h3>
            <?php
                if (isset($Chkpass)) {
                    echo $Chkpass;
                }
            ?>
            
            <form action="profile.php" method="POST">
                   Current Password:<input type="text" name="pass" placeholder="Enter Your Currnet Password"/>
                   New Password:<input name="newpass" placeholder="Enter Your New Password" type="text" />
                   Retype New Password:<input name="renewpass" placeholder="Enter Your New Password" type="text" />
                    <div class="send">
                    <div class="buttons"><div><button class="grey" name="send">Update</button></div></div>
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