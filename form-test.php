<?php
//print_r prints objects/data structures (eg array)
//$_GET is a superglobal

if(preg_match('/^application\/x-www-form-urlencoded/', $_SERVER['HTTP_CONTENT_TYPE'])) {
    //if 'HTTP CONTENT Type' within $_SERVER matches application\/x-... then do this ->
    header('Content-Type: text/plain'); //http header: Content-Type... value: text/plain
    print_r($_SERVER);
    print_r($_GET); 
    print_R($_POST); // if we do not have any request methods specified, it defaults to GET
    print_r($_REQUEST); // combination of GET and POST
}

if(preg_match('/^application\/json/', $_SERVER['HTTP_CONTENT_TYPE'])) {
    header('Content-Type: application/json'); //http header: Content-Type... value: text/plain
    file_get_contents('php://input'); // read body of contents (paramater is "stream wrapper")
    $data = json_decode(file_get_contents('php://input'));
    print(json_encode($data));
}
