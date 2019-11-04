<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include_once '../helpers/Format.php';?>
<?php 
	$pd = new Product();
	$fm = new Format();
?>
<?php 
	if (isset($_GET['delpro'])) {
		$id = preg_replace('/[^a-zA-Z0-9]+/', '', $_GET['delpro']);
		$delPro = $pd->delpROById($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
        	<div>
        		<?php 
       			if (isset($delPro)) {
            		echo $delPro;
            	}
              
            ?> 
        	</div>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5">SL</th>
					<th width="15">Product Name</th>
					<th width="10">Category</th>
					<th width="10">Brand</th>
					<th width="20">Description</th>
					<th width="5">Prizc</th>
					<th width="15">Image</th>
					<th width="5">Type</th>
					<th width="15">Action</th>
				</tr>
			</thead>
			<tbody>
	<?php 
		$getpd = $pd->getAllProduct();
		if ($getpd) {
			$i = 0;
			while ($result = $getpd->fetch_assoc()) {
			$i++;
	?>			
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><?php echo $result['catName']; ?></td>
					<td><?php echo $result['brandName']; ?></td>
					<td><?php echo $fm->textShorten($result['body'], 50); ?></td>
					<td>$<?php echo $result['price']; ?></td>
					<td><img src="<?php echo $result['image']; ?>" width="60px" height="40px" alt=""></td>
					<td>
						<?php 
							if ($result['type'] == 0) {
								echo "Featured";
							}else{
								echo "General";
							}
						?>
						
					</td>
					
					<td><a href="productedit.php?proid=<?php echo $result['productId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delpro=<?php echo $result['productId'];?>">Delete</a></td>
				</tr>
		<?php } } ?>		
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
