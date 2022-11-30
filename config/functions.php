<?php
/**
 * Debug function
 * d($var);
 */
function d($var,$caller=null)
{
    if(!isset($caller)){
        $caller = debug_backtrace(1)[0];
    }
    echo '<code>Line: '.$caller['line'].'<br>';
    echo 'File: '.$caller['file'].'</code>';
    echo '<pre>';
    yii\helpers\VarDumper::dump($var, 10, true);
    echo '</pre>';
}

/**
 * Debug function with die() after
 * dd($var);
 */
