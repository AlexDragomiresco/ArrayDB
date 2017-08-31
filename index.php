<?php
define('BASE_DIR', '/var/www/projectDB/');
require_once BASE_DIR . 'functions.php';
require_once BASE_DIR . 'operations/from.php';
require_once BASE_DIR . 'operations/select.php';
require_once BASE_DIR . 'operations/join.php';
require_once BASE_DIR . 'output/browser.php';

$fromArray = [];
$options = [];

$longOpts = array(
    "from:",
    "join::",
    "select::"

);


if(php_sapi_name() === "cli") {
    $options = getopt("", $longOpts);
} elseif (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])){
    $options = $_REQUEST;
} elseif (isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD'])){
    $options = $_REQUEST;
} else{
    echo "NOT !";
}



$file_input = $options['from'];



$fromArray = from($file_input);
$header = extractHeader($fromArray);
$database = arrayToDatabaseFormat('id', $fromArray, $header);

$joinTableNames = explode(',', $options['join']);
foreach ($joinTableNames as $joinTableName) {
    list($database, $header) = joinFx($joinTableName, $database, $header);
}

//print_r($header);

if(php_sapi_name() === "cli"){
    print_r($database);
} else{
    buildTable($database);
}








//$selectTable = explode(',', $options['select']);

/*
$select = $options["select"];

if (isset($select) === true) {
    echo "Select " . $select .PHP_EOL;
    $select_result = selectFx($file_input, $select);
    //var_dump($select_result);
} else {
    echo "enter a valid select operator" . PHP_EOL;
}*/



