<?php 
require_once('../include/config.php');
require_once(ROOT_PATH.'include/products.php');

if(isset($_GET["id"])){
	$product_id = intval($_GET["id"]);
	$product = get_product_single($product_id);
}

if (empty($product)){
	header("Location:".BASE_URL."shirts");
	exit();
} 
$section = "shirts";
$pageTitle = $product["name"];
include(ROOT_PATH."include/header.php");

?>

<div class="section page">
	<div class="wrapper">
		<div class="breadcrumb"><a href="<?php echo BASE_URL?>shirts">Shirts</a> &gt; <?php echo $product["name"] ?></div>

		<div class="shirt-picture">
			<span>
				<img src='<?php echo BASE_URL.$product["img"];?>' alt='<?php echo $product["name"]; ?>'>
			</span>
		</div>

		<div class="shirt-details">
			<h1> <span class="price">$<?php echo $product["price"]; ?> </span></h1>
			<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="<?php echo $product["paypal"]; ?>">
				<input type="hidden" name="item_name" value="<?php echo $product["name"];?>">
				<table>
					<tr>
						<td><input type="hidden" name="on0" value="Size">
							<label for="os0">Size</label>
						</td></tr><tr><td><select name="os0" id="os0">
						<?php 
						foreach($product["sizes"] as $size){
							echo("<option value=\"".$size."\">".$size."</option>");
						}
						?>
					</select> </td></tr>
				</table>
				<input type="submit" value="Add to Cart" name="submit">
			</form>
			<p class="note-designer">* All shirts are designed by Mike the Frog</p>
		</div>
	</div>
</div>




<?php include(ROOT_PATH."include/footer.php");?>