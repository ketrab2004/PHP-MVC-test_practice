<?php
class Country {
    private $db;

    public function __construct() {
        $this->db = new DatabaseController;
    }

    public function getCountries() {
        $this->db->query("SELECT * FROM `countries`");

        $result = $this->db->execute()->fetchAll();

        return $result;
    }
}
