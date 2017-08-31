<?php

function from($input_file)
{
    $path = sprintf('%s/database/%s.csv', BASE_DIR, $input_file);
    if (!file_exists($path)) {
        throw new Exception("NO such file!");
    }
    $handle = fopen($path, "r");
    $rows = [];
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $rows[] = $data;
    }
    fclose($handle);

    return $rows;
}