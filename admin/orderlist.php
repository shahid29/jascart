<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include '../classes/Customer.php';?>
<?php include_once '../helpers/Format.php';?>
<?php
	$pd= new Product();
	$fm= new Format();
	$cmr = new Customer();
?>
<?php 
	
	 if (isset($_GET['delorder'])) {
	 	$id = $_GET['delorder'];
	 	$id= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delorder']);

	 	$delOrder=$cmr->delOrderById($id);
	 }

?>
<style>
	.total{width: 20%;margin-left: 37%;margin-top: 2%;margin-bottom: -6%;text-align: center}
</style>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Order List</h2>

        <div class="total">
       

        <h2>Total = </h2>

        </div>
        <div class="block">  

            <?php 
            	if (isset($delOrder)) {
            			echo $delOrder;
            	}?>

            <table class="data display datatable" id="example">

			<thead>

				<tr>

					<th>SL.</th>
					<th>ID</th>
					<th>Order</th>
					
					
				</tr>
			</thead>
			<tbody>
		<?php
			
			
			$getList= $cmr->getOrderListById();
			$i=0;

			if ($getList) {
				
					while ($result=$getList->fetch_assoc()) {
						$i++;


		?>	
				<tr class="odd gradeX">
					<td><?php echo $i ;?></td>
					<td><?php echo $result['cmrId'];?></td>
					<td><a href="inbox.php?custId=<?php echo $result['cmrId'];?>">View</a> || <a onclick= "return confirm('Are You Sure to Delete !')"  href="?delorder= <?php echo $result['cmrId'];?>" >Delete</a></td>
					
					
						
				</tr>

		<?php  } }?>		
				
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
