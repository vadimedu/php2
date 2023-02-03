<?php

$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');
//Вставляем строку в таблицу пользователей

// $connection->exec(
// "INSERT INTO users (name, last_name) VALUES ('Ivan', 'Nikitin')"
// );
