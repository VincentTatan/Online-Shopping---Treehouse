<?php
require_once("../include/config.php");
$pageTitle = "Thank you for your order";
$section = "none";
include(ROOT_PATH."include/header.php");
?>
	<div class="section page">
		<div class="wrapper">

			<h1>Thank you! </h1>
			<p>Thank you for your payment. Your transaction has been completed and a receipt for your purchase has been emailed to you. You may log in to your account at www.paypal.com/sg to view details of this transaction!</p>
			<p>Need another shirt already? Visit the <a href="<?php echo BASE_URL;?>shirts.php">Shirts Listings</a> Page again. </p>

		</div>
	</div>
<?php include (ROOT_PATH."include/footer.php");
?>