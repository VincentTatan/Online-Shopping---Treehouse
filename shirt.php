<?php include('include/products.php');

if(isset($_GET["id"])){
	$product_id = $_GET["id"];
	if(isset($products[$product_id])){
		$product = $products[$product_id];
		echo "We have a valid shirt ID";
	} 
}

if (!isset($product)){
	header("Location:shirts.php");
	exit();
} 
$section = "shirts";
$pageTitle = $product["name"];
include("include/header.php");

?>

<div class="section page">
	<div class="wrapper">
		<div class="breadcrumb"><a href="shirts.php">Shirts</a> &gt; <?php echo $product["name"] ?></div>

		<div class="shirt-picture">
			<span>
				<img src='<?php echo $product["img"];?>' alt='<?php echo $product["name"]; ?>'>
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




<?php include("include/footer.php");?>