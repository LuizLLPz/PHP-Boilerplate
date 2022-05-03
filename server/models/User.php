<?php
class User {
    public function get_user($qb, $id) {
        return $qb->selectUnique('User', ['id' => $id]);
    }

    public function create_one($qb, $data) {
        return $qb->insert('User', $data);
    }
}