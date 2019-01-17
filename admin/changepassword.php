<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Adminlogin.php';?>
 <?php  
 
 $al= new Adminlogin();

 if ($_SERVER['REQUEST_METHOD']=='POST') {
    $adminUser=$_POST['adminUser'];
    $adminPass=md5($_POST['adminPass']);
    $newpass=md5($_POST['newpass']);
    $renewpass=md5($_POST['renewpass']);
    
    $Chkpass=$al->adminPassChange($adminUser,$adminPass,$newpass,$renewpass);
 }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
       
         <?php
                if (isset($Chkpass)) {
                    echo $Chkpass;
                }
            ?>
        <div class="block">               
         <form action="" method="POST">
            <table class="form">
            <tr>
                    <td>
                        <label>User Name</label>
                    </td>
                      <td>
                        <input type="text" placeholder="Enter Your User Name.."  name="adminUser" class="medium" />
                    </td>
                    </tr>
             <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                      <td>
                        <input type="password" placeholder="Enter Old Password..."  name="adminPass" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Retype New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Retype New Password..." name="renewpass" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>