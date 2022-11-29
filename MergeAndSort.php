<?php

/**
 * Функции объединения двух массивов и сортировка по значению
 * Первая функция включает в себя встроенные инструменты php
 * Вторая функция более нативная включает в себя лишь инструменты вставки в массив
 * Преимущества:
 *   mergeAndSort - сокращённый код, высокая скорость обработки на не больших массивах
 *   mergeAndSortNative - возможность влиять на сортировку по скорости при больших массивах
 * Недостатки:
 *   mergeAndSort - нет возможности повлиять на сортировку
 *   mergeAndSortNative - Затратен по оперативной памяти
 */

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
