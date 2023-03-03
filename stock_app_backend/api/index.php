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

    include $path.$className.'.php';
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

// endpoints starting with `/post` or `/posts` for GET shows all posts
// everything else results in a 404 Not Found
http_response_code(200);

echo "It worked AgainS";  
//var_dump(__DIR__);
//echo $uri[3];  
$controller = new Controller;
$uri_segments = $controller->getUriSegments();
var_dump($uri_segments);

?>