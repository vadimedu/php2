<?php
require_once __DIR__ . '/vendor/autoload.php';

use GeekBrains\LevelTwo\User\User;
use GeekBrains\LevelTwo\Blog\Posts;
use GeekBrains\LevelTwo\Blog\Comments;
use GeekBrains\LevelTwo\Repositories\SqliteUsersRepository;
use GeekBrains\LevelTwo\Repositories\SqlitePostsRepository;
use GeekBrains\LevelTwo\Repositories\SqliteCommentsRepository;

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
// $repoPost = new SqlitePostsRepository();
// $repoPost->save1($postObject, $connection);
// $repoPost->getPost($di->getId(), $connection);
$commentObj = new Comments();
$commentObj->setText('Комментарий к этой статье');
$commentObj->setAuthorId($di->getId());
$commentObj->setPostId(5);
$repoComments = new SqliteCommentsRepository();
$repoComments->saveComment($commentObj, $connection);
if($_SERVER['REQUEST_URI'] && $_POST){
    // var_dump($_POST);
    // var_dump($_SERVER['REQUEST_URI']);
    $newPostObject = $_POST;
    // var_dump($newPostObject);
   $saveNewPost = new SqlitePostsRepository();
   $saveNewPost->saveFromCurl($newPostObject, $connection);
}
?>