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
        <h2>Update Mobile No</h2>
        <?php
$fm = new Format();
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $num1=$fm->validation($_POST['num1']);
        $num2=$fm->validation($_POST['num2']);
      

        $num1=mysqli_real_escape_string($db->link,$num1);
        $num2=mysqli_real_escape_string($db->link,$num2);
       

         if ($num1 == "" || $num2 == "") {

                        echo "<span class='error'> Field Must Not be empty  !</span>";
                       
            
               }else{
        
         $query = " UPDATE tbl_contactNumber
                        SET 
                        num1='$num1',
                        num2='$num2'
                        
                      WHERE id ='1' ";

                     $updated_row= $db->update($query);
                        if ($updated_row) {
                            echo "<span class='success'>Mobile Number Updated Successfuly</span>";
                         
                        }else{
                            echo "<span class='error'>Something Went Wrong ! </span>";
                           
              }  
         } 
    }
?>
         
        <div class="block">  
 <?php 
        $query="SELECT * FROM tbl_contactNumber WHERE id='1'";
        $getNumber=$db->select($query);
        if ($getNumber) {
            while ($result=$getNumber->fetch_assoc()) {
       
    ?>             
         <form action="contactNumber.php" method="POST">
            <table class="form">					
                <tr>
                    <td>
                        <label>Mobile No.(1)</label>
                    </td>
                    <td>
                        <input type="text" name="num1"  class="medium" value="<?php echo $result['num1'];?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mobile No.(2)</label>
                    </td>
                    <td>
                        <input type="text" name="num2"  class="medium" value="<?php echo $result['num2'];?>" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td></td>
<?php if(Session::get('adminRole')=='0' || Session::get('adminRole')=='2') {?>

                    <td>
                        <input type="submit" name="submit" Value="Update" />
   <?php } ?>                 </td>

                </tr>
            </table>
            </form>
        <?php } }?>    
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>