<?php

$test_1 = [
    [2, 4, 5, 6, 8],
    [0, 1, 3, 7, 9],
];

function mergeAndSort(array $arr1, array $arr2): array
{
    $result = array_merge($arr1, $arr2);
    asort($result);

    return $result;
}

function mergeAndSortNative(array $arr1, array $arr2): array
{
    foreach ($arr2 as $val) {
        if ($arr1[0] > $val) {
            array_unshift($arr1, $val);
        } else if ($arr1[count($arr1) - 1] < $val) {
            $arr1[] = $val;
        } else {
            foreach ($arr1 as $k => $v) {
                if ($val < $v) {
                    array_splice($arr1, $k, 0, $val);
                    break;
                }
            }
        }
    }

    return $arr1;
}

print_r(mergeAndSortNative($test_1[0], $test_1[1]));
