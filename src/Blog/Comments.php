<?php

namespace GeekBrains\LevelTwo\Blog;

use GeekBrains\LevelTwo\User\User;

Class Comments {
    private string $postId;
    private string $text;
    private int $authorId;
    private int $commentId;

    public function setCommentId($commentId) {
        $this->commentId = $commentId;
    }
    public function getCommentId() {
        return $this->commentId;
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
    public function setPostId($idPost) {
        $this->postId = $idPost;
    }
    public function getPostId() {
        return $this->postId;
    }
}

?>