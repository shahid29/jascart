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
        <h2>Update Copyright Text</h2>
    <?php 
    $fm = new Format();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $note =$fm->validation($_POST['note']);
            $note = mysqli_real_escape_string($db->link,$note);
           if ($note=="") {
               echo "<span class='error'>Field must not be empty !</span>";
            } else{
                $query= " UPDATE tbl_copyright SET 
                note='$note' WHERE id='1'";
               $update_row=$db->update($query);
               if ($update_row) {
                     echo "<span class='success'>Copyright Update Successfully!</span>";
                } else{
                     echo "<span class='error'>Something Went Wrong!</span>";
                }

            }
        }
    ?> 
        <div class="block copyblock"> 
        <?php
            $db = new Database();
            $query=" SELECT * FROM tbl_copyright WHERE id='1' ";
            $copyrighttext = $db->select($query);
            if ($copyrighttext) {
                while ($result= $copyrighttext->fetch_assoc()) {
                    
          
        ?>
         <form action="copyright.php" method="POST">
            <table class="form">

                <tr>
                <td><input type="text" value="<?php echo $result['note'];?>" name="note" class="large" /></td>
                </tr>
				
				 <tr>

    <?php if(Session::get('adminRole')=='0' || Session::get('adminRole')=='2') {?>                  
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
    <?php } ?>

                </tr>
            </table>
            </form>
            <?php }} ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
<?php
            $db = new Database();
            $query=" SELECT * FROM tbl_copyright WHERE id='1' ";
            $copyrighttext = $db->select($query);
            if ($copyrighttext) {
                while ($result= $copyrighttext->fetch_assoc()) {
                    
            }} 
        ?>