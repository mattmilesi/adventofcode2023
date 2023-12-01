<?php

$content = file_get_contents('input/input.txt');
$content = str_replace([
    'one',
    'two',
    'three',
    'four',
    'five',
    'six',
    'seven',
    'eight',
    'nine'
], [
    'one1one',
    'two2two',
    'three3three',
    'four4four',
    'five5five',
    'six6six',
    'seven7seven',
    'eight8eight',
    'nine9nine'
], $content);
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
    echo $first.$last."\n";
    $sum += intval($first . $last);
}

echo $sum;