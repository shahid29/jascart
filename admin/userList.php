<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Adminlogin.php';?>


<style>
	.total{width: 20%;margin-left: 37%;margin-top: 2%;margin-bottom: -6%;text-align: center}
</style>
<?php 
	 $al= new Adminlogin();
	 if (isset($_GET['deluser'])) {
	 	
	 	$id= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['deluser']);

	 	$deluser=$al->delUserById($id);
	 }

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>User List</h2>

        <div class="total">
        <?php
			
			$al= new Adminlogin();
			$getList= $al->getUserList();
			$i=0;
			if ($getList) {
				
					while ($result=$getList->fetch_assoc()) {
						$i++;

		}}?>	

        <h2>Total = <?php echo $i ;?></h2>

        </div>
        <div class="block">  
        <?php 
            	if (isset($deluser)) {
            			echo $deluser;
            	}

            ?>  

            <table class="data display datatable" id="example">

			<thead>

				<tr>

					<th>SL.</th>
					<th>ID</th>
					<th>Name</th>
					<th>User Name</th>
					<th>Email</th>
					<th>Details</th>
					<th>Role</th>
					<th>Action</th>

					
					
				</tr>
			</thead>
			<tbody>
		 <?php
			$fm = new Format();
			$al= new Adminlogin();
			$getList= $al->getUserList();
			$i=0;
			if ($getList) {
				
					while ($result=$getList->fetch_assoc()) {
						$i++;

		?>	
				<tr class="odd gradeX">
					<td><?php echo $i ;?></td>
					<td><?php echo $result['adminId'];?></td>
					<td><?php echo $result['adminName'];?></td>
					<td><?php echo $result['adminUser'];?></td>
					<td><?php echo $result['adminEmail'];?></td>
					<td><?php echo $fm->textShorten($result['adminDetails'],10);?></td>
					<td>
						<?php 
							if ($result['adminRole']==0) {
								echo "Admin";
							}elseif ($result['adminRole']==1) {
								echo "Editor";
							}elseif ($result['adminRole']==2) {
								echo "Author";
							}else{
								echo "Moderator";
							}
						?>
						
					</td>
					<td>
					<a href="viewuser.php?adminId=<?php echo $result['adminId'];?>">View</a> 
					<?php if(Session::get('adminRole')=='0') {?>
					|| <a onclick= "return confirm('Are You Sure to Delete !')"  href="?deluser= <?php echo $result['adminId'];?>" >Delete
					</a> <?php }?>

					</td>
					
					
					
					
						
				</tr>

		<?php } }?>		
				
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
