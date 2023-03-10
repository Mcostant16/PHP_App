<?php
//require __DIR__ . "\..\inc\bootstrap.php";
//require __DIR__ . "\controller\controller.php";
include "controller/controller.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $path = 'stocks/';

    //include $path.$className.'.php';
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

// endpoints starting with `/post` or `/posts` for GET shows all posts
// everything else results in a 404 Not Found
http_response_code(200);

//need this part of code because it routes to the api on the 
//cors preflights and since it has the uri it triggers the route twice
/////basically ignore the preflight cors option
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {    
    return 0;    
 }    

//echo "It worked AgainS";  
//var_dump(__DIR__);
//echo $uri[3];  
$controller = new Controller;
#$method = $controller->getMethod();
$method = $controller->main_function();
//$uri_segments = $controller->getUriSegments();
//var_dump($method);
//in order to not throw an error on the return json needs to be returned.
echo json_encode($method);
//var_dump($uri_segments);

//include $path.$className.'.php';

?>