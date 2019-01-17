<?php 
        include  '../lib/Session.php';
        include '../lib/Database.php';
        Session::checkSession();
        
     

?>



<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>



<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
	
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
	
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/livelogo.gif" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>JAS-CART</h1>
					<p>www.Jas-cart.com</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>

                            <?php

                                if (isset($_GET['action']) && isset($_GET['action'])=="logout") {

                                    Session::destroy();
                                    
                                }

                            ?>

                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello <?php echo Session::get('adminName');?></li>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="dashbord.php"><span>Dashboard</span></a> </li>
                <li class="ic-charts"><a href="profile.php"><span>User Profile</span>
                <li class="ic-form-style"><a href="customerList.php"><span>Cust. List</span></a></li>

               
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li> 
				
          
                <li class="ic-grid-tables"><a href="inbox.php"><span>Order
                     <?php
                 $db = new Database();
                            $query="SELECT * FROM tbl_order WHERE status='0' ORDER BY id DESC";
                        $msg =$db->select($query);
                        if ($msg) {
                            $count = mysqli_num_rows($msg);
                            echo "(".$count.")";
                        }else{
                           
                        }
                        ?>
                </span></a></li>
              



<?php if(Session::get('adminRole')=='0' || Session::get('adminRole')=='3'){ ?>
                <li class="ic-grid-tables"><a href="message.php"><span>Message
                
                 <?php
                 $db = new Database();
                            $query="SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
                        $msg =$db->select($query);
                        if ($msg) {
                            $count = mysqli_num_rows($msg);
                            echo "(".$count.")";
                        }else{
                           
                        }
                        ?> </span></a></li>
<?php }?> 
                        <?php 
                        
                            if(Session::get('adminRole')=='0') {?>
                               <li class="ic-charts"><a href="useradd.php"><span>Add User</span></a></li>
                           <?php }?> 
                        
                        
                        <li class="ic-form-style"><a href="userList.php"><span>User List</span></a></li>
                
            </ul>
        </div>
        <div class="clear">
        </div>
    