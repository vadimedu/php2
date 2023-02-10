<?php

namespace GeekBrains\LevelTwo\Repositories;

use GeekBrains\LevelTwo\User\User;
use PDO;

class SqliteUsersRepository

{
    private PDO $connection;
    // public function __construct($connection){
    //     $this->connection = $connection;
    // }
    public function save(User $user, $connection)
    {
        $this->connection = $connection;

        $statement = $this->connection->prepare(
            'INSERT INTO users (name, last_name)
            VALUES (:first_name, :last_name)'
            );
            var_dump($statement);

            $statement->execute([
            ':first_name' => $user->getFirstName(),
            ':last_name' => $user->getLastName(),
            ]);


    }

}
