<?php
class QueryBuilder {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function selectAll($table) {
        
    }

    public function selectUnique($table, $key) {   
        $base = "SELECT * FROM $table WHERE ".array_keys($key)[0]." = ".array_values($key)[0];
        $stmt = $this->conn->prepare($base);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function selectJoin($table, $relations, $exchange, $key) {
        $base = "SELECT * FROM $table";
        $base.= " JOIN ";
        foreach ($relations as $relation)  {
            $base .= $relation. ' ';
        }
        $base .= "ON ";
        foreach ($exchange as $rels) {
            $base.= $rels[0]. ' = '. $rels[1];
        }
        $base.= ' WHERE '. array_keys($key)[0]. ' = '. array_values($key)[0];
        $stmt = $this->conn->prepare($base);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}