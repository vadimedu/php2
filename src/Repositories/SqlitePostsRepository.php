<?php

namespace GeekBrains\LevelTwo\Repositories;

use GeekBrains\LevelTwo\User\User;
use GeekBrains\LevelTwo\Blog\Posts;
use GeekBrains\LevelTwo\Repositories\SqliteUsersRepository;
use PDO;

class SqlitePostsRepository

{
    private PDO $connection1;
    // public function __construct($connection){
    //     $this->connection = $connection;
    // }
    public function save1($post, $connection)
    {
        $this->connection1 = $connection;

        var_dump($this->connection1);
        var_dump($post);
        $statement1 = $this->connection1->prepare(

            'INSERT INTO posts (id_author, title, content)
            VALUES (:id_author, :title, :content)'
            );

            $statement1->execute([
            ':title' => $post->getTitle(),
            ':content' => $post->getText(),
            ':id_author' => $post->getAuthorId(),
            ]);

    }
    public function getPost($id, $connection){
        $this->connection1 = $connection;
        var_dump($this->connection1);
        $statement1 = $this->connection1->query("SELECT * FROM posts WHERE id_author = '$id'");
        var_dump($statement1);
        $result = $statement1->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
    }

    public function saveFromCurl($post, $connection)
    {
        $this->connection1 = $connection;

        var_dump($this->connection1);
        var_dump($post);
        $value = array_values($post);
        $passUser = $value[1];
        $connectUser = new SqliteUsersRepository();
        $currentUser = $connectUser->getUser('104', $connection);

            if($passUser === $currentUser['password']){
                echo 'Привет из блока сохранения поста';
                $statement1 = $this->connection1->prepare(

                'INSERT INTO posts (id_author, title, content)
                VALUES (:id_author, :title, :content)'
                );

                $statement1->execute([
                ':title' => $value[2],
                ':content' => $value[3],
                ':id_author' => $value[0],
                ]);
            } else echo 'Видимо нет такого пользователя или пароли не совпали. Отказано в создании поста', "\n";
        }


    }
