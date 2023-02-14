<?php

namespace GeekBrains\LevelTwo\Repositories;

use GeekBrains\LevelTwo\User\User;
use GeekBrains\LevelTwo\Blog\Posts;
use PDO;

class SqliteLikesRepository

{
    private PDO $connection1;
    // public function __construct($connection){
    //     $this->connection = $connection;
    // }
    public function save2($like, $connection)
    {
        $this->connection1 = $connection;
        print_r($like);
        $like_author_id = $like->getAuthorID();
        $like_post_id = $like->getPostId();
        print_r($like_author_id);
        $this->getLikeInfo($like_author_id, $like_post_id, $this->connection1);
        var_dump($this->connection1);
        var_dump($like);
        $statement1 = $this->connection1->prepare(

            'INSERT INTO likes (id_author_like, id_post_like)
            VALUES (:id_author, :id_post)'
            );

            $statement1->execute([
            ':id_post' => $like_post_id,
            ':id_author' =>  $like_author_id,
            ]);

    }
    public function getLikeInfo($id_Author, $id_post, $connection){
        $this->connection1 = $connection;
        var_dump($this->connection1);
        $statement1 = $this->connection1->prepare("SELECT * FROM likes WHERE id_author_like = '$id_Author'");
        $statement1->execute(['id_Author' => $id_Author]);
        var_dump($statement1);
        $result = $statement1->fetchAll(PDO::FETCH_ASSOC);

        print_r($result);

    }


}