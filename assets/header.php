<?php

header("Access-Control-Allow-Origin: *");  // Allow all domains or specify a domain
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// If the request is an OPTIONS request, respond with a 200 status to pass the preflight check
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header('HTTP/1.1 400 OK');
    exit();
}

require_once('controller.php');
require_once('utils.php');


$data = file_get_contents('php://input');
if(base64_encode(base64_decode($data)) == $data){
    $data = !empty($data) ? json_decode(base64_decode($data), true) : [];
}else{
    $data = !empty($data) ? json_decode($data, true) : [];
}
