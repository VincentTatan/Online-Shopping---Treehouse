<?php
include('config.php');
function get_list_view_html ($product){
	$output = "";
	$output = $output. "<li>" ;
	$output = $output. '<a href="'.BASE_URL.'shirts/'.$product["sku"].'/">';
	$output = $output. '<img src="'.BASE_URL.$product["img"].'" "'.'alt="'.$product["name"].'">';
	$output = $output. '<p>View Details</p>';
	$output = $output. "</a>";
	$output = $output. "</li>" ;
	return $output;
}
function get_products_count(){
	require(ROOT_PATH."include/database.php");
    try{
        $results = $db->query("SELECT COUNT(sku) from products");
    } catch(Exception $e){
        echo "Data could not be retrieved from the database. ";
        exit;
    }
    $count = $results->fetchColumn(0);
    return $count;
}
/*
Return the subset of products based on the values received. Using the order of elements in the array
*/
function get_products_subset($start,$end){
$offset = $start-1;
$rows = $end-$start+1;

require(ROOT_PATH."include/database.php");
    try{
        $results = $db->prepare("SELECT name,price,img,sku,paypal 
            from products 
            ORDER BY sku 
            LIMIT ?, ?");
        $results->bindParam(1,$offset,PDO::PARAM_INT);
        $results->bindParam(2,$rows,PDO::PARAM_INT);
        $results->execute();
    } catch(Exception $e){
        echo "Data could not be retrieved from the database. ";
        exit;
    }
    $subset = $results->fetchAll(PDO::FETCH_ASSOC);
    
	return $subset;
}
/*
    Get the four most recent products, using the element orders
*/
function get_products_recent(){
	require(ROOT_PATH."include/database.php");
    try{
        $results = $db->query("SELECT name,price,img,sku,paypal from products ORDER BY sku DESC LIMIT 4");
    } catch(Exception $e){
        echo "Data could not be retrieved from the database. ";
        exit;
    }
    $recent = $results->fetchAll(PDO::FETCH_ASSOC);
    $recent = array_reverse($recent);
    return $recent;
}
/*
	* Queries through all product, looking for a search term in the product names
  	* Argument: String $s the search term
  	* return : List of search products
*/
function get_products_search($s){
	require(ROOT_PATH."include/database.php");
    try{
        $results = $db->prepare("SELECT name,price,img,sku,paypal from products WHERE name LIKE ? ORDER BY sku");
        $results->bindValue(1,"%".$s."%");
        $results->execute();
    } catch(Exception $e){
        echo "Data could not be retrieved from the database. ";
        exit;
    }
    
    return $results->fetchAll(PDO::FETCH_ASSOC);
    
}

function get_products_all() {
   require(ROOT_PATH."include/database.php");
    try{
        $results = $db->query("SELECT name,price,img,sku,paypal from products ORDER BY sku DESC");
    } catch(Exception $e){
        echo "Data could not be retrieved from the database. ";
        exit;
    }
    $products = $results->fetchAll(PDO::FETCH_ASSOC);

    return $products;
}
/*
    Returns an array of product information that matches sku. It will return a boolean false
    @param int %sku the sku
    @return mixed array list of product information for the one matching product
*/
function get_product_single($sku){
    require(ROOT_PATH."include/database.php");
    try{
        $results= $db->prepare("select name,price,img,sku,paypal from products where sku = ?");
        $results->bindParam(1,$sku);
        $results->execute();
    }catch(Exception $e){
        echo "Data could not be retrieved from the database.";
        exit;
    }
    $product = $results->fetch(PDO::FETCH_ASSOC);

    if($product === false){
        return $product;
    }
    $product ["sizes"] =array();
    try{
        $results = $db->prepare("SELECT size 
            FROM products_sizes ps 
            INNER JOIN sizes s 
            ON ps.size_id = s.id 
            WHERE product_sku = ? 
            ORDER BY 'order'");
        $results->bindParam(1,$sku);
        $results->execute();
    }catch(Exception $e){
        echo "Data could not be retrieved from the database.";
        exit;
    }

    while($row = $results->fetch(PDO::FETCH_ASSOC)){
        $product["sizes"][]=$row["size"];
    }
    return $product;
}


?>