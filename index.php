<?php
require __DIR__ . "/Config/config.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = explode( '/', $uri );

if((isset($uri[2]) && $uri[2] != 'api') || (isset($uri[3]) && $uri[3] != 'v1')){
    header("HTTP/1.1 404 Not Found");
    exit();
} else if ((isset($uri[4]) && $uri[4] != 'user') || !isset($uri[5])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

require ROOT_PATH . "/Controller/Api/UserController.php";
 
$user = new UserController();
 
$methodName = $uri[6] . 'Action';
$user->{$methodName}();

?>