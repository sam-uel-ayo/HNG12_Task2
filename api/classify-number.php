<?php
require '../assets/header.php';

use cUtils\cUtils;
use Number\Number;


if (!isset($_GET['number']) || strlen(trim($_GET['number'])) === "") {
    return cUtils::outputData(false, cUtils::errorMessage(), true, 400);
    exit;
}
$number = trim($_GET['number']);

//Logic here
$classification = Number::classifyNumber($number);
return cUtils::outputData($classification->status, $classification->data, true, $classification->status_code);
