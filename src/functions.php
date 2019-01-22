<?php

/**
 * 助手函数
 * @author LIUJIAN <coder.keda@gmail.com>
 */

if (!function_exists('app')) {
    // 返回当前App实例
    function app()
    {
        return \Mix::$app;
    }
}

if (!function_exists('env')) {
    // 获取一个环境变量的值
    function env($name, $default = '')
    {
        return \Mix::$env->section($name, $default);
    }
}

if (!function_exists('beanname')) {
    // 获取Bean名称
    function beanname($class)
    {
        return \Mix\Core\Bean::name($class);
    }
}

if (!function_exists('xgo')) {
    // 创建协程
    function xgo($function)
    {
        \Mix\Core\Coroutine::create($function);
    }
}

if (!function_exists('println')) {
    // 输出字符串并换行
    function println($strings)
    {
        echo $strings . PHP_EOL;
    }
}
