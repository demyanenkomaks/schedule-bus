<?php

/**
 * Debug function
 * debug($var);
 */
function debug($var,$caller=null)
{
//    if(!isset($caller)){
//        $caller = array_shift(debug_backtrace(1));
//    }
    echo '<code>File: '.$caller['file'].' / Line: '.$caller['line'].'</code>';
    echo '<pre>';
    yii\helpers\VarDumper::dump($var, 10, true);
    echo '</pre>';
}

/**
 * Debug function with die() after
 * dd($var);
 */
function removeExcess($str)
{
    $str = trim($str);

    $str = preg_replace('|[\s]+|s', ' ', $str); // Удалить двойные пробелы

    return $str;
}