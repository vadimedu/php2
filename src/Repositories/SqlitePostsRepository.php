<?php

namespace GeekBrains\LevelTwo\Repositories;

use GeekBrains\LevelTwo\User\User;
use GeekBrains\LevelTwo\Blog\Posts;
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
        var_dump($value[0]);
        var_dump($value[1]);
        var_dump($value[2]);
        $statement1 = $this->connection1->prepare(

            'INSERT INTO posts (id_author, title, content)
            VALUES (:id_author, :title, :content)'
            );

            $statement1->execute([
            ':title' => $value[1],
            ':content' => $value[2],
            ':id_author' => $value[0],
            ]);

    }

}