<?php
require_once __DIR__ . '/vendor/autoload.php';

use GeekBrains\LevelTwo\User\User;
use GeekBrains\LevelTwo\Blog\Posts;
use GeekBrains\LevelTwo\Repositories\SqliteUsersRepository;
use GeekBrains\LevelTwo\Repositories\SqlitePostsRepository;

$faker = Faker\Factory::create('ru_RU');

$di = new User();
$di->setFirstName($faker->firstName());
$di->setLastName($faker->lastName());
$di->setId($faker->unique()->randomNumber());
$postObject = new Posts();
$postObject->setTitle('Новый пост');
$postObject->setText('Здесь контент поста!');
$postObject->setAuthorId($di->getId());

$console_arg = str_replace('_', ' ', $argv[1]);

$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');

$repo = new SqliteUsersRepository();
$repo->save($di, $connection);
$repoPost = new SqlitePostsRepository();
$repoPost->save1($postObject, $connection);
$repoPost->getPost($di->getId(), $connection);
?>