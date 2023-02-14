<?php

namespace GeekBrains\LevelTwo\Blog;

use GeekBrains\LevelTwo\User\User;

Class Likes {

    private string $id_author_like;
    private int $id_post_like;

    public function setAuthorID($authorId) {
        $this->id_author_like = $authorId;
    }
    public function getAuthorID() {
        return $this->id_author_like;
    }
    public function setPostId($id_post_like) {
        $this->id_post_like = $id_post_like;
    }
    public function getPostId() {
        return $this->id_post_like;
    }

}

?>