<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../helpers/Format.php';?>
<style>
    .leftside{float:left;width: 70%}
    .rightside{float:left;width: 20%}
    .rightside img{height: 160px;width: 170px
    }
</style>
<?php
     if(Session::get('adminRole')=='0' || Session::get('adminRole')=='2') {
       
    }else{
         echo "<script>window.location='dashbord.php';</script>";
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Website Logo</h2>
<?php
$fm = new Format();
    if ($_SERVER['REQUEST_METHOD']=='POST') {
       
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['logo']['name'];
                $file_size = $_FILES['logo']['size'];
                $file_temp = $_FILES['logo']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $sameimage = 'logo'.'.'.$file_ext;
                $uploaded_image = "uploads/".$sameimage;

                if ($file_name == "") {

                        echo "<span class='error'> You have to must browse an image  !</span>";
                       
            
               }
               else{
                    if (!empty($file_name)) {
                        
                    

                       if ($file_size >1048567)
                             { echo "<span class='error'>Image Size should be less then 1MB! </span>"; } elseif (in_array($file_ext, $permited) === false) { echo "<span class='error'>You can upload only:-" .implode(', ', $permited)."</span>"; }

                       else
                       {
                            move_uploaded_file($file_temp, $uploaded_image);
                            $query = " UPDATE tbl_logo
                                    SET 
                                   
                                    logo       ='$uploaded_image'
                                    

                                    WHERE id ='1'

                                     ";

                     $updated_row= $db->update($query);
                        if ($updated_row) {
                            echo "<span class='success'>Data Updated Successfuly</span>";
                            
                        }else{
                            echo "<span class='error'>Something Went Wrong ! </span>";
                            

                }

              }
            }
            else{

                            $query = " UPDATE tbl_logo
                                    
                                    

                                    WHERE id ='1'

                                     ";

                     $updated_row= $db->update($query);
                        if ($updated_row) {
                            echo "<span class='success'>Data Updated Successfuly</span>";
                         
                        }else{
                            echo "<span class='error'>Something Went Wrong ! </span>";
                           
                }
            }           

        }
    }
?>        
         <?php 
        $query="SELECT * FROM tbl_logo WHERE id='1'";
        $get=$db->select($query);
        if ($get) {
            while ($result=$get->fetch_assoc()) {
       
    ?>   
        <div class="block sloginblock"> 
     
        <div class="leftside">             
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">					
               
				
                <tr>
                    <td>
                        <label>Upload Logo</label>
                    </td>
                    <td>
                        <input type="file" name="logo"/>
                    </td>
                </tr>
                
				 
				
				 <tr>
                    <td>
                    </td>
     <?php if(Session::get('adminRole')=='0' || Session::get('adminRole')=='2') {?>    
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                <?php }?>    

                </tr>
            </table>
            </form>
            </div>
           
            <div calss="rightside">
                <img src="<?php echo $result['logo'];?>"  alt="logo" />
                
            </div>
        </div>
    <?php }} ?>     
    </div>
</div>
<?php include 'inc/footer.php';?>