<?php

use Person\Test;

spl_autoload_register(function ($class) {
    $file = str_replace(['\\', '_'], '/', $class) . '.php';
    var_dump($file);
    if (file_exists($file)) {
    require $file;
    }
    });


$post = new Test();
$post->setName('Василий');
echo $post->getName(). PHP_EOL;
$name = new Another_Name();
$name->setName('Иван');
echo $name->getName();
?>