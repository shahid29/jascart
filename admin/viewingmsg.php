<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/Customer.php');
?>
<?php 
     if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
        echo "<script>window.location='message.php';</script>";
    }else{
        
        $id= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['msgid']);
    }
?>
<?php 
    if ($_SERVER['REQUEST_METHOD']=='POST') {
          echo "<script>window.location='message.php';</script>";
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
                <h2>Viewing Message</h2>
               <div class="block copyblock"> 

                

                 <form action=" " method="POST">
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
                            <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                            <label style="text-align:left">Email</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                            <label>Phone</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['phone'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                            <label>Date</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $fm->formatDate($result['date']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Message</label>
                                <td> <textarea class="tinymce" name="body">
                                    <?php echo $result['body']?>
                                </textarea></td>
                            </td>
                        </tr>
                        <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="OK" />
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