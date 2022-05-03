<?php
class User {
    public function get_user($qb, $id) {
        return $qb->selectUnique('Users', ['id' => $id]);
    }
}