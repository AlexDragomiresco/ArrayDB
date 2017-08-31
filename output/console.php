<?php
require_once 'Console/Table.php';

function displayTable($input_array, $header_array)
{
    $tbl = new Console_Table();
    $tbl->setHeaders($header_array);

    $tbl->addRow(array('PHP', 1994));
    $tbl->addRow(array('C',   1970));
    $tbl->addRow(array('C++', 1983));

    echo $tbl->getTable();

}
