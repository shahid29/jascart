<?php include 'inc/header.php' ;?>
<?php 
  $login =  Session::get("cuslogin");
  if ($login==true) {
    header("Location:index.php");
  }
?>

<!--ustomer Login-->
    <?php 
    
     if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) {
         $customerLog=$cmr->customerLogin($_POST);
    }

  ?>
  <style>
    .search {float: left;margin-top: -36px;}
    .red {color:red;} 
    .register_account{width:64%; height: 100% }
    .register_account table td{width:53.50%;}
  </style>


 <div class="main">
    <div class="content">
       <div class="login_panel">
        <?php
          if (isset($customerLog)) {
            echo $customerLog;
          }
        ?>
          <h3>Existing Customers</h3>
          <p>Sign in with the form below.</p>
          <form action="" method="POST">
                <input name="email/phone" placeholder="Enter E-mail or Phone Number" type="text" />
                  <input name="pass" placeholder="Enter Your Password" type="password" />
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                      <p class="note">If you forgot your passoword just <a href="forgetuserpass.php">Click Here</a></p>
                    </div>

                 </form>

<!--ustomer Login End-->         
                
                   
      
<!--ustomer Registration --> 
    <?php 
    $cmr = new Customer();
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
        <form action="login.php" method="POST" >
         <table class="form">
             

<tr><td>
      <label>Name:</label></td>
<?php
  if (!isset($_POST['name']) || $_POST['name'] == NULL) {?>
      <td><input type="text" name="name" class="medium" placeholder="Enter Your Name"  /></td>

   <?php }else{?>
      <td><input type="text" name="name" class="medium" placeholder="Enter Your Name" value="<?php echo $_POST['name'];?>" /></td>
             
  <?php }?> 
      
          </tr>
          <tr><td>
          <label>Address:</label></td>
<?php
  if (!isset($_POST['address']) || $_POST['address'] == NULL) {?>
     <td> <input type="text" name="address" class="medium" placeholder="Enter Your Address"  /></td>

   <?php }else{?>
      <td><input type="text" name="address" class="medium" placeholder="Enter Your Address" value="<?php echo $_POST['address'];?>" /></td>
  <?php }?> 
      </tr>
        

        <tr><td>
        <label>City:</label></td>
<?php
  if (!isset($_POST['city']) || $_POST['city'] == NULL ) {?>
      <td><input type="text" name="city" class="medium" placeholder="Enter Your City"  /></td>

   <?php }else{?>
      <td><input type="text" name="city" class="medium" placeholder="Enter Your City" value="<?php echo $_POST['city'];?>" /></td>
      
                       
<?php }?> 
        </tr>
        <tr><td>
                  <label>Zip-Code:</label></td>
<?php
  if (!isset($_POST['zip']) || $_POST['zip'] == NULL) {?>
      <td><input type="text" name="zip" class="medium" placeholder="Enter Your Zip-Code"  /></td>

   <?php }else{?>
    <td>  <input type="text" name="zip"  class="medium" placeholder="Enter Your Zip-Code" value="<?php echo $_POST['zip'];?>" /></td>
               
  <?php }?>           
      
          </tr>

        <tr><td>
      <label>Country:</label></td>
<?php
  if (!isset($_POST['country']) || $_POST['country'] == NULL) {?>
     <td> <input type="text" name="country" class="medium" placeholder="Enter Your Country"  /></td>

   <?php }else{?>
      <td><input type="text" name="country" class="medium" placeholder="Enter Your Country" value="<?php echo $_POST['country'];?>" /></td>

                
  <?php }?> 
      </tr>


                  

      
      <tr><td>
    <label>Phone:</label></td>
<?php
  if (!isset($_POST['phone']) || $_POST['phone'] == NULL) {?>
     <td> <input type="text" name="phone" class="medium" placeholder="Enter Your Phone Number"  /></td>

   <?php }else{?>
   <td> <input type="text" name="phone" class="medium" placeholder="Enter Your Phone Number" value="<?php echo $_POST['phone'];?>" /> </td>
    
    <?php }?>
    
    </tr>
          
    <tr><td>
    <label>Email:</label></td>
<?php
  if (!isset($_POST['email']) || $_POST['email'] == NULL) {?>
     <td> <input type="text" name="email" class="medium" placeholder="Enter Your Email"  /></td>

   <?php }else{?>

      <td><input type="text" name="email" class="medium" placeholder="Enter Your Email" value="<?php echo $_POST['email'];?>" /></td>
                


  <?php }?> 
 
      </tr>
          
        
             <tr><td>
            <label>Password:</label></td>
<?php
  if (!isset($_POST['pass']) || $_POST['pass'] == NULL) {?>
     <td> <input type="text" name="pass" class="medium" placeholder="Enter Your  Password"  /></td>

   <?php }else{?>
    <td>  <input type="text" name="pass" placeholder="Enter Your  Password" class="medium" value="<?php echo $_POST['pass'];?>" /></td>
<?php }?>
       </tr>
          

    <tr><td>
    <label>Retype Password:</label></td>
<?php
  if (!isset($_POST['repass']) || $_POST['repass'] == NULL) {?>
     <td> <input type="text" name="repass" class="medium" placeholder="Retype Your Password"  /></td>

   <?php }else{?>
    <td>  <input type="text" name="repass" class="medium" placeholder="Retype Your Password" value="<?php echo $_POST['repass'];?>" /></td>
<?php }?>
      </tr>
             
       

       <tr><td></td><td>
        <div class="buttons"><div><button class="grey" name="register">Register</button></div></div></td></tr>

<!--ustomer Registration End--> 
       
        
        </table>
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