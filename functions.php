<?php

function extractHeader(array &$tableArray)
{
    return array_shift($tableArray);
}

/**
 * Transforms an array of rows into an associative array as follows:
 * [
 *      "userId" => [
 *          "column1" => "value1",
 *          ...
 *      ],
 *      ...
 *
 * ]
 *
 * @param string $primaryKeyName
 * @param array $tableArray
 * @param array $header
 * @return array
 */
function arrayToDatabaseFormat($primaryKeyName = 'id', array $tableArray, array $header)
{
    $userIdColumnIndex = array_search($primaryKeyName, $header);
    $modifiedTable = [];
    foreach ($tableArray as $row) {
        $modifiedTable["id: " . $row[$userIdColumnIndex]] = array_combine($header, $row);
    }

    return $modifiedTable;
}

/**
 * Transforms an array of rows into an associative array as follows:
 * [
 *      "userId" => [
 *          "tableName" => [
 *              0 => [
 *                  "column1" => "value1",
 *                  ...
 *              ],
 *              ...
 *          ]
 *      ]
 * ]
 *
 * @param string $primaryKeyName
 * @param array $tableArray
 * @param array $header
 * @param string $tableName
 * @return array
 */
function arrayToNestedDatabaseFormat($primaryKeyName = 'id', array $tableArray, array $header, $tableName)
{
    $userIdColumnIndex = array_search($primaryKeyName, $header);
    array_splice($header, $userIdColumnIndex, 1);
    $nestedArray = [];
    foreach ($tableArray as $row) {
        $userId = $row[$userIdColumnIndex];
        array_splice($row, $userIdColumnIndex, 1);
        $nestedArray["id: " . $userId][$tableName][] = array_combine($header, $row);
    }

    return $nestedArray;
}

