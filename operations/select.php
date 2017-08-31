<?php

function selectFx($selectTable ,array $database,array $header)
{

    $selectTable = joinFx($selectTable, $database, $header);


    $test = get_people($input_file);
    $fucking_keys = get_key($input_file);
    $select_option = array_column($test, $select);
    //var_dump($fucking_keys);
    //var_dump($select_option);
    /*foreach($select_option as $select)
    {
        $select_arr[] = array_merge($fucking_keys, $select_option);
        var_dump($select_arr);

    }*/

    $select_arr[] = array_combine($fucking_keys, $select_option);
    var_dump($select_arr);
}

//selectFx('user.csv', 'last_name');

