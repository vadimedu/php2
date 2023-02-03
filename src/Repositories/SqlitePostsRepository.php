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
    public function save1(Posts $post, $connection)
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

}