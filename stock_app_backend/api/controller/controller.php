<?php
class Controller
{
    /** 
* __call magic method. 
*/
//private $url;

function __construct() {
    $this->uri = $_SERVER['REQUEST_URI'];
    $this->method = $_SERVER['REQUEST_METHOD'];
  }

public function  main_function() {

     $endpoint = $this->getUriSegments();
     $activity = $this->getMethod();
     //var_dump($this->getUriSegments());
     //var_dump($endpoint);
     switch  ($endpoint[3]) {
        case "getHistory":
            return $endpoint[3].'_'.$activity;
        case "getSymbols":
            return $endpoint[3].'_'.$activity;
        default:
            header("HTTP/1.1 404 Not Found");
            return "Page Not Found";
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
    protected function getQueryStringParams()
    {
        return parse_str($_SERVER['QUERY_STRING'], $query);
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