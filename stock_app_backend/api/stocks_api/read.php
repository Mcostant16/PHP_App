<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here


// include database and object files
include_once '../models/database.php';
include_once 'objects/stocks.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
//was going to use search but I return all the data and then search through the client
$search = '';
// initialize object
$symbols = new Symbols($db, $search);

// read products will be here

// query products
$stmt = $symbols->get_Symbols();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        //var_dump($row);
        $product_item=array(
            "id" => $Symbol,
            "name" => $Name,
            "industry" => html_entity_decode($Industry),
            "Volume" => $Volume,
            "sector" => $Sector,
            "market_cap" => $Market_Cap
        );
 
        array_push($products_arr["records"], $product_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($products_arr, JSON_PRETTY_PRINT);
}
 
// no products found will be here
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}
 