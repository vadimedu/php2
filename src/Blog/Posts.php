<?php

namespace GeekBrains\LevelTwo\Blog;

use GeekBrains\LevelTwo\User\User;

Class Posts {
    private string $title;
    private string $text;
    private int $authorId;

    public function setTitle($title) {
        $this->title = $title;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setText($text) {
        $this->text = $text;
    }
    public function getText() {
        return $this->text;
    }
    public function setAuthorId($id) {
        $this->authorId = $id;
    }
    public function getAuthorId() {
        return $this->authorId;
    }
    // public function setPostId($idPost) {
    //     $this->postId = $idPost;
    // }
    public function getPostId() {
        return $this->postId;
    }
}

?>