<?php
require_once __DIR__ . '/vendor/autoload.php';

use GeekBrains\LevelTwo\User\User;
use GeekBrains\LevelTwo\Blog\Posts;

$faker = Faker\Factory::create('ru_RU');
// generate data by calling methods
// echo $faker->name();
// 'Vince Sporer'
// echo $faker->email();
// 'walter.sophia@hotmail.com'
// echo $faker->text();
echo 'Не забывайте, что Вы можете запустить скрипт совместно с передачей ему аргумента
пример: php index.php Привет_всем!!! просто напишите что-нибудь после index.php и не забывайте
про нижнее подчеркивание между словами'.PHP_EOL;
$di = new User();
$di->setFirstName($faker->firstName());
echo ($di->getFirstName()).PHP_EOL;
$di->setLastName($faker->lastName());
echo ($di->getLastName()).PHP_EOL;
$di->setId($faker->unique()->randomNumber());
echo ($di->getId()).PHP_EOL;
$postObject = new Posts();

// var_dump($postObject);
// echo "<br>";
$console_arg = str_replace('_', ' ', $argv[1]);
echo 'спасибо за Ваши теплые слова - "' . $console_arg . '"'.PHP_EOL;
?>