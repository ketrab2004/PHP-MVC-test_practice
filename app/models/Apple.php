<?php
class Apple {
    private $db;

    public function __construct() {
        $this->db = new DatabaseController;
    }

    public function getApples() {
        $this->db->query("SELECT * FROM `apple`");

        $result = $this->db->execute()->fetchAll();

        return $result;
    }
}
