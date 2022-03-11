<?php
class Fruit {
    private $db;

    public function __construct() {
        $this->db = new DatabaseController;
    }

    public function getFruits() {
        $this->db->query("SELECT * FROM `fruit`");

        $result = $this->db->execute()->fetchAll();

        return $result;
    }
}
