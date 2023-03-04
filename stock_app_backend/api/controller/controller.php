<?php
include_once 'stocks_api/insert_stock.php';
class Controller
{
    /** 
* __call magic method. 
*/
//private $url;

function __construct() {
    $this->uri = $_SERVER['REQUEST_URI'];
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->query_string = $_SERVER['QUERY_STRING'];
    //var_dump($_SERVER['QUERY_STRING']);
  }

public function  main_function() {

     $endpoint = $this->getUriSegments();
     $activity = $this->getMethod();
     //$params   = $this->getQueryStringParams();
     //var_dump($params);
     //var_dump($this->getUriSegments());
     //var_dump($endpoint);
     switch  ($endpoint[3]) {
        case "getHistory":
            $addStocks = new Insert_Stock; 
            $addStocks->uploadRecords();
            return $endpoint[3].'_'.$activity;
        case "getSymbols":
            return $endpoint[3].'_'.$activity;
        default:
            //this route needs to be built
            header("HTTP/1.1 404 Not Found");
            include_once 'stocks_api/read.php';
            exit();
            //return "Page Not Found";
     }
}


public function __call($name, $arguments)
    {
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }
    /** 
* Get URI elements. 
* 
* @return array 
*/
    private function getUriSegments()
    {
        $url = parse_url($this->uri, PHP_URL_PATH);
        $url = explode( '/', $url );
        //var_dump($this->url);
        return $url;
    }
/* 
    * Get Method. 
    * 
    * @return array 
*/
    private function getMethod()
        {
            $method = $this->method;
            return $method;
        }
/** 
 *
* Get querystring params. 
* 
* @return array 
*/
    private function getQueryStringParams()
    {
            parse_str($this->query_string, $query);
           // $query = explode( '/', $query );
           //print_r($query);
            return $query;
    }
    /** 
* Send API output. 
* 
* @param mixed $data 
* @param string $httpHeader 
*/
    protected function sendOutput($data, $httpHeaders=array())
    {
        header_remove('Set-Cookie');
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
        echo $data;
        exit;
    }
}