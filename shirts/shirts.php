<?php 
require_once ('../include/config.php');
require_once(ROOT_PATH.'include/products.php');

if (empty($_GET["pg"])){
	$current_page= 1;
} else{
	$current_page = $_GET["pg"];
}
$current_page = intval($current_page);

$total_products = get_products_count();
$products_per_page = 8;
$total_pages = ceil($total_products/$products_per_page);
if($current_page>$total_pages){
	header("Location: ./pg=".$total_pages);
}

if($current_page<1){
	header("Location: ./");
}

$products = get_products_subset($start,$end);

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