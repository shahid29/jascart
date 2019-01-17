<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/Cart.php');
	include_once ($filepath.'/../classes/Product.php');
	include_once ($filepath.'/../lib/Database.php');
	
	
	$fm = new Format();
	
?>
<?php
    if(Session::get('adminRole')=='0' || Session::get('adminRole')=='3' ) {
      
    }else{
    	echo "<script>window.location='dashbord.php';</script>";
    }
  ?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Message</h2>
                <?php
                $db = new Database();
	if (isset($_GET['seenid'])) {
			$seenid = $_GET['seenid'];
		$query=" UPDATE tbl_contact 
		SET
		status='1' 
		WHERE id='$seenid'";
		$update_row=$db->update($query);
		if ($update_row) {
		echo "<span class='success'>Message Sent in the Seen Box</span>";
		}else{
				echo "<span class='error'>Something Went Worng !!</span>";
		}
	}
?>
          
               
                <div class="block">        
                    <table style="text-align:center" class="data display datatable" id="example">
					<thead style="text-align:center">
						<tr>
							<th>SN</th>
							<th>Name </th>
							<th>Email</th>
							<th>Phone</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php 
					 $db = new Database();
						$query="SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
						$msg =$db->select($query);
							if ($msg) {
								$i=0;
								while ($result=$msg->fetch_assoc()) {
									$i++;
								?>
					
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $result['phone']; ?></td>
							<td><?php echo $fm->textShorten($result['body'],60); ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td>
							

		<?php if(Session::get('adminRole')=='0' || Session::get('adminRole')=='3'){ ?>
							<a href="viewingmsg.php?msgid=<?php echo $result['id']; ?>">View</a>||<a href="replaymsg.php?msgid=<?php echo $result['id']; ?>">Replay</a>||
							<a onclick= "return confirm('Are You Sure to Move to Seen Box !');" href="?seenid=<?php echo $result['id']; ?>">Seen</a>
					<?php } ?>		
							</td>
						</tr>
				<?php }}?>
					
					</tbody>
					
							
				
				</table>
               </div>
            </div>

    <div class="box round first grid">
                <h2>Seen Message</h2>
          	<?php
          	if (isset($_GET['delid'])) {
			$delid = $_GET['delid'];
		$query=" DELETE FROM tbl_contact  WHERE id='$delid'";
		$delete=$db->update($query);
		if ($delete) {
		echo "<span class='success'>Message Deleted Successfully </span>";
		}else{
				echo "<span class='error'>Something Went Worng !!</span>";
		}
	}
          	?>
               
                <div class="block">        
                    <table style="text-align:center" class="data display datatable" id="example">
					<thead style="text-align:center">
						<tr>
							<th>SN</th>
							<th>Name </th>
							<th>Email</th>
							<th>Phone</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php 
					 $db = new Database();
						$query="SELECT * FROM tbl_contact WHERE status='1' ORDER BY id DESC";
						$msg =$db->select($query);
							if ($msg) {
								$i=0;
								while ($result=$msg->fetch_assoc()) {
									$i++;
								?>
					
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $result['phone']; ?></td>
							<td><?php echo $fm->textShorten($result['body'],60); ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td>
			<?php if(Session::get('adminRole')=='0' || Session::get('adminRole')=='2'){ ?>
							<a href="viewingmsg.php?msgid=<?php echo $result['id']; ?>">View</a> ||
							<a onclick= "return confirm('Are You Sure to Delete !');" href="?delid=<?php echo $result['id']; ?>">Delete</a>
					<?php } ?>	
							
							</td>
						</tr>
				<?php }}?>
					
					</tbody>
					
							
				
				</table>
               </div>
            </div>     

        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>