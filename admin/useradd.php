<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Adminlogin.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
        include_once ($filepath.'/../lib/Session.php'); ?>
 


<?php 
 $al= new Adminlogin();
    
     if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
         $addingUser=$al->addUser($_POST);
        }

    ?>
    <?php
    if(!Session::get('adminRole')=='0') {
        echo "<script>window.location='dashbord.php';</script>";
    }
  ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add User</h2>
               <div class="block copyblock"> 
                    <?php
                        if (isset($addingUser)) {
                            echo $addingUser;
                            
                        }

                    ?>
                  

                 <form action="useradd.php" method="POST">
                    <table class="form">					
                        <tr>
                    <td>
                        <label>Name</label>
                    </td>
                      <td>
                        <input type="text" placeholder="Enter Your User Name.."  name="adminName" class="medium" />
                    </td></tr>
             <tr>
                    <td>
                        <label>User Name</label>
                    </td>
                      <td>
                        <input type="text" placeholder="Enter User Name..."  name="adminUser" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>User Email</label>
                    </td>
                      <td>
                        <input type="text" placeholder="Enter Your Email..."  name="adminEmail" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="adminPass" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Retype Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Retype New Password..." name="adminConPass" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>User Role</label>
                    </td>
                    <td>
                        <select id="select" name="adminRole">
                            <option>Select User Role</option>
                            <option value="0">Admin</option>
                            <option value="1">Author</option>
                            <option value="2">Editor</option>
                        </select>
                    </td>
                </tr>
                 
                
                 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Create" />
                    </td>
                </tr>
            </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>