<?php
class Post {

    public function selectJoin($qb, $table, $relations, $exchange, $key) {
        return $qb->selectJoin($table, $relations, $exchange, $key);
    }
}