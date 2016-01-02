<?php 
include ('../include/config.php');
include(ROOT_PATH.'include/products.php');
$products = get_products_all();
$pageTitle ="Shirts Catalogue";
$section = "shirts";
include(ROOT_PATH.'include/header.php');
?>

	<div class="section shirts page">
		<div class="wrapper">
			<h1>Mike&rsquo;s Full Catalog of Shirts</h1>
			<ul class="products">
				<?php foreach($products as  $product){ 
					echo get_list_view_html($product);
				} ?>
			</ul>
		</div>
	</div>
<?php include(ROOT_PATH.'include/footer.php');?>