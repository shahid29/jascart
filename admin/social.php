<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../helpers/Format.php';?>
<?php
     if(Session::get('adminRole')=='0' || Session::get('adminRole')=='2') {
       
    }else{
         echo "<script>window.location='dashbord.php';</script>";
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <?php
$fm = new Format();
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $fb=$fm->validation($_POST['fb']);
        $tw=$fm->validation($_POST['tw']);
        $gp=$fm->validation($_POST['gp']);

        $fb=mysqli_real_escape_string($db->link,$fb);
        $tw=mysqli_real_escape_string($db->link,$tw);
        $gp=mysqli_real_escape_string($db->link,$gp);

         if ($fb == "" || $tw == "" || $gp == "" ) {

                        echo "<span class='error'> Field Must Not be empty  !</span>";
                       
            
               }else{
        
         $query = " UPDATE tbl_social
                        SET 
                        fb='$fb',
                        tw='$tw',
                        gp='$gp'
                      WHERE id ='1' ";

                     $updated_row= $db->update($query);
                        if ($updated_row) {
                            echo "<span class='success'>Socail Media Updated Successfuly</span>";
                         
                        }else{
                            echo "<span class='error'>Something Went Wrong ! </span>";
                           
              }  
         } 
    }
?>
         
        <div class="block">  
 <?php 
        $query="SELECT * FROM tbl_social WHERE id='1'";
        $getSocial=$db->select($query);
        if ($getSocial) {
            while ($result=$getSocial->fetch_assoc()) {
       
    ?>             
         <form action="social.php" method="POST">
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="fb"  class="medium" value="<?php echo $result['fb'];?>" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="tw" class="medium" value="<?php echo $result['tw'];?>" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="gp" class="medium" value="<?php echo $result['gp'];?>" />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>

<?php if(Session::get('adminRole')=='0' || Session::get('adminRole')=='2') {?>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
<?php }?>

                </tr>
            </table>
            </form>
        <?php } }?>    
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>