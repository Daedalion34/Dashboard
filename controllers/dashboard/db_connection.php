<?php

$dash_db_user = '####';
$dash_db_ip   = '####';
$dash_db_pwd  = '####';

$dash_db_name = $bd_name.'####';
if (preg_match('/dev*/', $_SERVER['####'])) {
    $dash_db_name = preg_replace(
        '/([a-z]+)(-dev([0-9]+))/',
        '####',
        $bd_name
    );
}

if (preg_match('/preprod-*/', $_SERVER['####'])) {
    $dash_db_pwd = '####';
}

if(!preg_match('/preprod-*/', $_SERVER['####']) && !preg_match('/dev*/', $_SERVER['####']))
{
    $dash_db_ip  = '####';
    $dash_db_pwd = '####';
}

$DB = new \BFWSql\SqlConnect($dash_db_ip, $dash_db_user, $dash_db_pwd, $dash_db_name);
