<?php

function show_array($array, $level, $sub){
    if (is_array($array) == 1){
         array_slice($array, 1);
         foreach($array as $key_val => $value) {
            $offset = "";
            if (is_array($value) == 1){
                echo "<tr>";
                $offset = do_offset($level);
                echo $offset . "<td>" . $key_val . "</td>";
                show_array($value, $level+1, 1);
            }
            else{
                if ($sub != 1){
                    echo "<tr nosub>";
                    $offset = do_offset($level);
                }
                $sub = 0;
                echo $offset . "<td main ".$sub." width=\"120\">" . $key_val .
                    "</td><td width=\"120\">" . $value . "</td>";
                echo "</tr>\n";
            }
        }
    }
    else{
        return;
    }
}

function do_offset($level){
    $offset = "";
    for ($i=1; $i<$level;$i++){
        $offset = $offset . "<td></td>";
    }
    return $offset;
}

function buildTable($array){
    echo "<table cellspacing=\"0\" border=\"2\">\n";
    show_array($array, 1, 0);
    echo "</table>\n";
}

//buildTable($arr);
