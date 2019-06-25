<?php

/**
 * 助手函数
 * @author liu,jian <coder.keda@gmail.com>
 */

if (!function_exists('app')) {
    // 返回当前App实例
    function app()
    {
        return \Mix::$app;
    }
}

if (!function_exists('xgo')) {
    // 创建协程
    function xgo($function, ...$params)
    {
        \Mix\Concurrent\Coroutine::create($function, ...$params);
    }
}

if (!function_exists('xdefer')) {
    // 创建延迟执行
    function xdefer($function)
    {
        return \Swoole\Coroutine::defer($function);
    }
}

if (!function_exists('println')) {
    // 输出字符串并换行
    function println($strings)
    {
        echo $strings . PHP_EOL;
    }
}
