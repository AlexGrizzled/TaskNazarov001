<?php

$test1 = [1, 5, 12];
$test2 = [26, 30, 22];

function getMedian(int $a1, int $a2, int $a3): int
{
    if (($a1 > $a2 && $a1 < $a3) || ($a1 < $a2 && $a1 > $a3)) {
        return $a1;
    }

    if (($a2 > $a1 && $a2 < $a3) || ($a2 < $a1 && $a2 > $a3)) {
        return $a2;
    }

    return $a3;
}

echo getMedian($test2[0], $test2[1], $test2[2]) . PHP_EOL;
