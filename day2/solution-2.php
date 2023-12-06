<?php

$config = [];

$content = file_get_contents('input/input.txt');
$content = explode("\n", $content);

foreach ($content as $line) {
    //preg_match_all('/^Game (?<id>\d):(( (?<qty>\d*) (?<color>blue|red|green),?)*;?)*$/', $line, $matches);
    [$game, $info] = explode(':', $line, 2);
    $game = explode('Game ', $game)[1];
    $config[$game] = [
        'id' => $game,
        'required' => [
            'red' => 0,
            'green' => 0,
            'blue' => 0,
        ],
    ];
    $info = explode(';', $info);
    foreach ($info as $item) {
        $item = explode(',', $item);
        foreach ($item as $subItem) {
            [$quantity, $color] = explode(' ', trim($subItem));
            $config[$game]['required'][$color] = max($quantity, $config[$game]['required'][$color]);
        }
    }
}

$needed = [];
$powers = [];
foreach ($config as $game => $info) {
    $needed[] = [
        'red' => 0,
        'green' => 0,
        'blue' => 0,
    ];
    foreach ($info['required'] as $color => $quantity) {
        if ($quantity > $needed[$game][$color]) {
            $needed[$game][$color] = $quantity;
        }
    }
    $powers[$game] = $needed[$game]['red'] * $needed[$game]['green'] * $needed[$game]['blue'];
}

print_r($powers);
echo array_sum($powers);
