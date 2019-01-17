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
<style>
	.total{width: 20%;margin-left: 37%;margin-top: 2%;margin-bottom: -6%;text-align: center}
</style>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Customer List</h2>

        <div class="total">
        <?php
			
			
			$getList= $cmr->getCustomerList();
			$i=0;
			if ($getList) {
				
					while ($result=$getList->fetch_assoc()) {
						$i++;

		}}?>	

        <h2>Total = <?php echo $i ;?></h2>

        </div>
        <div class="block">  

            <table class="data display datatable" id="example">

			<thead>

				<tr>

					<th>SL.</th>
					<th>ID</th>
					<th>Name</th>
					<th>Address</th>
					<th>City</th>
					<th>Zip</th>
					<th>Phone</th>
					<th>Email</th>
					
				</tr>
			</thead>
			<tbody>
		<?php
			
			
			$getList= $cmr->getCustomerList();
			$i=0;
			if ($getList) {
				
					while ($result=$getList->fetch_assoc()) {
						$i++;

		?>	
				<tr class="odd gradeX">
					<td><?php echo $i ;?></td>
					<td><?php echo $result['id'];?></td>
					<td><?php echo $result['name'];?></td>
					<td><?php echo $result['address'];?></td>
					<td><?php echo $result['city'];?></td>
					<td><?php echo $result['zip'];?></td>
					<td><?php echo $result['phone'];?></td>
					<td><?php echo $result['email'];?></td>
					
					
					
					
						
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
