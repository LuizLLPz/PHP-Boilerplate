<?php
require MODELS. 'Post.php';
function get ($qb, $uid) {
    $post = new Post;
    return $post->selectJoin($qb, 'Post', ['User'], [['User.id', 'Post.id']], ['User.id' => $uid]);
}
