<?php
include('config.php');
function get_list_view_html ($product_id, $product){
	$output = "";
	$output = $output. "<li>" ;
	$output = $output. '<a href="'.BASE_URL.'shirt?id='.$product_id.'">';
	$output = $output. '<img src="'.BASE_URL.$product["img"].'" "'.'alt="'.$product["name"].'">';
	$output = $output. '<p>View Details</p>';
	$output = $output. "</a>";
	$output = $output. "</li>" ;
	return $output;
}

$products = array();

$products[101] = array(
	"name" => "Logo Shirt, Red",
	"img" => "img/shirts/shirt-101.jpg",
	"price" => 18,
	"paypal" =>"RQFP8KVCGS5GS",
	"sizes" => array("Small","Medium","Large","X-Large")
	);
$products[102] = array(
	"name" => "Mike the Frog Shirt, Black",
	"img" => "img/shirts/shirt-102.jpg",
	"price" => 20,
	"paypal" =>"SUUAX58ZATW2S",
	"sizes" => array("Small","Medium","Large","X-Large")
	);
$products[103] = array(
	"name" => "Mike the Frog Shirt, Blue",
	"img" => "img/shirts/shirt-103.jpg",    
	"price" => 20,
	"paypal" =>"27MCARS3UBPY2",
	"sizes" => array("Small","Medium","Large","X-Large")
	);
$products[104] = array(
	"name" => "Logo Shirt, Green",
	"img" => "img/shirts/shirt-104.jpg",    
	"price" => 18,
	"paypal" =>"2NEUJC7HH25JG",
	"sizes" => array("Small","Medium","Large","X-Large")
	
	);
$products[105] = array(
	"name" => "Mike the Frog Shirt, Yellow",
	"img" => "img/shirts/shirt-105.jpg",    
	"price" => 25,
	"paypal" =>"2F299FWN467AS",
	"sizes" => array("Small","Medium","Large","X-Large")
	);

$products[106] = array(
	"name" => "Logo Shirt, Gray",
	"img" => "img/shirts/shirt-106.jpg",    
	"price" => 20,
	"paypal" =>"3PCJ6CVELSRBN",
	"sizes" => array("Small","Medium","Large","X-Large")
	);

$products[107] = array(
	"name" => "Logo Shirt, Turquoise",
	"img" => "img/shirts/shirt-107.jpg",    
	"price" => 20,
	"paypal" =>"EU5X4DEWXCGMC",
	"sizes" => array("Small","Medium","Large","X-Large")
	);

$products[108] = array(
	"name" => "Logo Shirt, Orange",
	"img" => "img/shirts/shirt-108.jpg",    
	"price" => 25,
	"paypal" =>"66L42QVWUMGCL",
	"sizes" => array("Large","X-Large")
	);


?>