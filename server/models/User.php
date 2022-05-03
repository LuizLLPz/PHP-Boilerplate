<?php
class User {
    public function selectUnique($qb, $id) {
        return $qb->selectUnique('User', ['id' => $id]);
    }
}