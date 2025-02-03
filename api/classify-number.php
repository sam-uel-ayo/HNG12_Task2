<?php
require '../assets/header.php';

use cUtils\cUtils;
use Number\Number;


if (!isset($_GET['number']) || empty(trim($_GET['number']))) {
    return cUtils::outputData(false, cUtils::errorMessage("Pass a number"), true, 400);
}
$number = trim($_GET['number']);

//Logic here
$classification = Number::classifyNumber($number);
return cUtils::outputData($classification->status, $classification->data, true, $classification->status_code);
