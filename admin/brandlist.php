<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>

<?php 
	 $brand= new Brand();
	 if (isset($_GET['delbrand'])) {
	 	$id = $_GET['delbrand'];
	 	$id= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delbrand']);

	 	$delBrand=$brand->delBrandById($id);
	 }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">     

            <?php 
            	if (isset($delBrand)) {
            			echo $delBrand;
            	}

            ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
		<?php if(Session::get('adminRole')=='0') {?>					
							<th>Action</th>
			<?php } ?>				
						</tr>
					</thead>
					<tbody>

				<?php
						 $getBrand = $brand->getAllBrand();

						 $i=0;

						 if ($getBrand) {
						 	while($result=$getBrand->fetch_assoc()){

						 		$i++;
					
					?>

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandName'];?></td>
					<?php if(Session::get('adminRole')=='0') {?>		
							<td><a href="brandedit.php?brandid=<?php echo $result['brandId'];?>">Edit</a> || <a onclick= "return confirm('Are You Sure to Delete !')"  href="?delbrand= <?php echo $result['brandId'];?>" >Delete</a></td>
					<?php } ?>		
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

