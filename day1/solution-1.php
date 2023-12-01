<?php

$content = file_get_contents('input/input.txt');
$content = explode("\n", $content);

$sum = 0;

foreach ($content as $line) {
    $first = null;
    $last = null;
    for($i = 0; $i < strlen($line); $i++) {
        if(ctype_digit($line[$i])) {
            if($first === null) {
                $first = $line[$i];
            }
            $last = $line[$i];
        }
    }
    $sum += intval($first . $last);
}

echo $sum;