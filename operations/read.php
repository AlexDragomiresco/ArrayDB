<?php

function get_header($input_file)
{
    $var = file("/var/www/projectDB/database/" . $input_file, FILE_IGNORE_NEW_LINES);
    $header = explode(",", $var[0]);
    return $header;
}

//$x = get_header("children.csv");
//var_dump($x);

function get_key($input_file)
{

    $rows = array_map('str_getcsv', file('/var/www/projectDB/database/' . $input_file));
    $header = array_shift($rows);
    //$csv = array();
    $col = array_search("Value", $header);
    foreach ($rows as $row) {
        $csv[] = $row[$col];
    }
    /*foreach ($rows as $row) {
        $csv[] = array_combine($header, $row);
    }*/
    return $csv;

}

//$y = get_key("children.csv");
//var_dump($y);

function get_id($input_file)
{
    $var = file("/var/www/projectDB/database/" . $input_file, FILE_IGNORE_NEW_LINES);
    $temp = array_slice($var,1);
    $user_key = array();

    foreach($temp as $value)
    {
        $user_key[] = explode(",",$value);
    }

    $new_arr = array_combine(get_key($input_file), $user_key);
    return $new_arr;
}

//$w = get_id("user.csv");
//var_dump($w);

function get_user_id($input_file)
{
    $rows = array_map('str_getcsv', file('/var/www/projectDB/database/' . $input_file));
    $header = array_shift($rows);
    $arr = array();
    foreach ($rows as $row) {
        $arr[] = array_combine($header, $row);
    }
    //$good_arr = array_combine($arr, get_id($input_file));
    return $arr;

}
//$v= get_user_id("address.csv");
//var_dump($v);

function get_people($input_file)
{
    foreach (get_user_id($input_file) as $person) {
        $people[] = array_combine(get_header($input_file), $person);
        $people++;
    }

    $users = array_combine(get_key($input_file), $people);
    return $users;
}

//$q = get_people("address.csv");
//print_r($q);

