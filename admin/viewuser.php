<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Adminlogin.php';?>
<?php 
    
   
?>
<?php 
 $al= new Adminlogin();
     $adminId=Session::get('adminId');
     $adminRole=Session::get('adminRole');
    
     if (!isset($_GET['adminId']) ||  $_GET['adminId'] == NULL) {
        echo "<script>window.location='userList.php';</script>";
        }else{
            $id= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['adminId']);
        }

    ?>
    <style>
        .copyblock {
    border: 1px solid #e6f0f3;
    line-height: 32px;
    margin-left: 10px;
    margin-top: 20px;
    padding-left: 20px;
    width: 98%;
    </style>

        <div class="grid_10">
            <div class="box round first grid">

                <h2>Profile Details</h2>
                <?php
             
               $getData=$al->getUserData($id);
                if ($getData) {
                    while ($result=$getData->fetch_assoc()) {
                        
                    ?>
               <div class="block copyblock"> 
                    <?php
                        if (isset($profileUpdate)) {
                            echo $profileUpdate;
                            
                        }

                    ?>
                  

                 <form action="viewuser.php" method="POST">
                    <table class="form">					
                        <tr>
                    <td>
                        <label>Name</label>
                    </td>
                      <td>
                        <input type="text" readonly name="adminName" class="medium" value="<?php echo $result['adminName']?>" />
                    </td></tr>
             <tr>
                    <td>
                        <label>User Name</label>
                    </td>
                      <td>
                        <input type="text" readonly name="adminUser" class="medium" value="<?php echo $result['adminUser']?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>User Email</label>
                    </td>
                      <td>
                        <input type="text" readonly name="adminEmail"  class="medium" value="<?php echo $result['adminEmail']?>"/>
                    </td>
                </tr>
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Details</label>
                    </td>
                    <td>
                        <textarea class="tinymce"   readonly >
                             <?php echo $result['adminDetails'];?>
                        </textarea>
                    </td>
                </tr>
                 
                
                 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="OK" />
                    </td>
                </tr>
            </table>
                    </form>
                </div>
                <?php } }?>
            </div>
        </div>


<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>