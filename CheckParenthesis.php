<?php

const OPEN_PARENTHESIS = '(';
const CLOSE_PARENTHESIS = ')';

// правильное
$test_1 = 'test(br(o)) foo(333)df';
// закрывающая скобка в начале
$test_2 = 'te)st(br(o)) foo(333)df';
// открывающая скобка в конце
$test_3 = 'test(br(o)) foo(333)d (f';
// лишние скобки
$test_4 = 'test (3(test)';
$test_5 = 'test (3)test)';

function checkParenthesis(string $str): bool
{
    $openOffset = mb_strpos($str, OPEN_PARENTHESIS);
    $closeOffset = mb_strpos($str, CLOSE_PARENTHESIS);

    if ($openOffset === false && $closeOffset === false) {
        return true;
    }

    if ($openOffset === false || $closeOffset === false) {
        return false;
    }

    if ($openOffset > $closeOffset) {
        return false;
    }

    $openOffset = mb_strrpos($str, OPEN_PARENTHESIS);
    $closeOffset = mb_strrpos($str, CLOSE_PARENTHESIS);

    if ($openOffset > $closeOffset) {
        return false;
    }

    $openCounter = 0;
    $openOffset = -1;
    while (($openOffset = mb_strpos($str, OPEN_PARENTHESIS, $openOffset + 1)) !== false) {
        $openCounter++;
    }

    $closeCounter = 0;
    $closeOffset = -1;
    while (($closeOffset = mb_strpos($str, CLOSE_PARENTHESIS, $closeOffset + 1)) !== false) {
        $closeCounter++;
    }

    return  ($openCounter === $closeCounter);
}

echo (checkParenthesis($test_1) ? "YES" : "NOT") . "\n";
