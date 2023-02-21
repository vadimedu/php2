<?php
require_once __DIR__ . '/vendor/autoload.php';

use GeekBrains\LevelTwo\User\User;
use GeekBrains\LevelTwo\Blog\Posts;
use GeekBrains\LevelTwo\Blog\Comments;
use GeekBrains\LevelTwo\Blog\Likes;
use GeekBrains\LevelTwo\Repositories\SqliteUsersRepository;
use GeekBrains\LevelTwo\Repositories\SqlitePostsRepository;
use GeekBrains\LevelTwo\Repositories\SqliteCommentsRepository;
use GeekBrains\LevelTwo\Repositories\SqliteLikesRepository;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$log = new Logger('name');
$logInfo = new Logger('infoLikes');
$log->pushHandler(new StreamHandler(dirname(__FILE__).'/warning.log', Logger::WARNING));
$log->warning('Foo');
$log->error('Bar');

$faker = Faker\Factory::create('ru_RU');
$userCreate = new User();
$userCreate->setFirstName($faker->firstName());
$userCreate->setLastName($faker->lastName());
$userCreate->setPass('1234');
$userCreate->setId($faker->unique()->randomNumber());
$postObject = new Posts();
$postObject->setTitle('Новый пост');
$postObject->setText('Здесь контент поста!');
$postObject->setAuthorId($userCreate->getId());

$console_arg = str_replace('_', ' ', $argv[1]);

$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');

$repo = new SqliteUsersRepository();
$repo->save($userCreate, $connection);
$repo->getUser('110', $connection);
// $repoPost = new SqlitePostsRepository();
// $repoPost->save1($postObject, $connection);
// $repoPost->getPost($di->getId(), $connection);
$commentObj = new Comments();
$commentObj->setText('Комментарий к этой статье');
$commentObj->setAuthorId($userCreate->getId());
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
    $likeObject = new Likes();
   $likeObject->setAuthorID(2);
   $likeObject->setPostId(20);
   echo $likeObject->getAuthorID(2);
   echo $likeObject->getPostId(20);
   $saveNewLike = new SqliteLikesRepository();
//    var_dump($saveNewLike);
   $saveNewLike->save2($likeObject, $connection, $logInfo);
?>