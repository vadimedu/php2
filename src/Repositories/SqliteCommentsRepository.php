<?php

namespace GeekBrains\LevelTwo\Repositories;

use GeekBrains\LevelTwo\User\User;
use GeekBrains\LevelTwo\Blog\Posts;
use GeekBrains\LevelTwo\Blog\Comments;
use PDO;

class SqliteCommentsRepository
{
    private PDO $connection2;

    public function saveComment($comment, $connection){
        $this->connection2 = $connection;
        $statement2 = $this->connection2->prepare(

            'INSERT INTO comments (id_author_ref, id_post_ref, text)
            VALUES (:id_author_ref, :id_post_ref, :text)'
            );

            $statement2->execute([
            ':id_post_ref' => $comment->getPostId(),
            ':text' => $comment->getText(),
            ':id_author_ref' => $comment->getAuthorId(),
            ]);
    }
    public function getComment($id, $connection){
        $this->connection2 = $connection;
        var_dump($this->connection2);
        $statement2 = $this->connection2->query("SELECT * FROM posts WHERE id_author = '$id'");
        var_dump($statement2);
        $result = $statement2->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
    }
}