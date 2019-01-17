<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/Customer.php');
    $fm= new Format();
?>
<?php 
     if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
        echo "<script>window.location='message.php';</script>";
    }else{
        
        $id= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['msgid']);
    }
?>

<style>
    .copyblock {
    border: 1px solid #e6f0f3;
    line-height: 32px;
    margin-left: 0;
    margin-top: 20px;
    padding-left: 20px;
    width: 95%;
    margin-right: -14px;}
</style>
 

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Reply Message</h2>
<?php 
 $cmr = new Customer();
 $fm = new Format();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {

     $to=$fm->validation($_POST['toEmail']);
    $subject=$fm->validation($_POST['subject']);
      $message=$fm->validation($_POST['rplymsg']);
      $headers=$fm->validation($_POST['FromEmail']);
      
   
       
       $result = mail($to, $subject, $message,$headers);
       if ($result) {
              echo "<span class='success'>Sent ! </span>";
          }  else{
            echo "<span class='error'>Not Sent ! </span>";
          } 

    }
?>
                
               <div class="block copyblock"> 

                

                 <form action="" method="POST">
                 <?php 
                     $db = new Database();
                     $fm = new Format();
                        $query="SELECT * FROM tbl_contact WHERE id='$id'";
                        $msg =$db->select($query);
                            if ($msg) {
                               
                                while ($result=$msg->fetch_assoc()) {
                                  
                                ?>
                    <table class="form">					
                        
                         <tr>
                            <td>
                            <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly name="toEmail" readonly value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                            <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="FromEmail" placeholder="Please Enter Jas-Cart Email"  class="medium" />
                            </td>
                        </tr>
                        
                         <tr>
                            <td>
                            <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="Please Enter Subject"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Message</label>
                                <td> <textarea class="tinymce" name="rplymsg">
                                    
                                </textarea></td>
                            </td>
                        </tr>
                        <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Send" />
                        </td>
                        </tr>
                       
                    </table>
                    <?php }}?>
                    </form>
                  
                </div>
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