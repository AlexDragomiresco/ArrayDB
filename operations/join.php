<?php

function joinFx($joinTableName, array $database, array $header)
{
    $joinTable = from($joinTableName);

    $joinHeader = extractHeader($joinTable);
    $joinTable = arrayToNestedDatabaseFormat('user_id', $joinTable, $joinHeader, $joinTableName);

    $database = array_merge_recursive($database, $joinTable);
    $header = array_merge($header, $joinHeader);
    return [
        $database,
        $header
    ];
}

//joinFx('user.csv','address.csv');
