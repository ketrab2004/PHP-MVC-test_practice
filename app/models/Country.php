<?php
class Country {
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseController;
    }

    public function getContinents()
    {
        // https://stackoverflow.com/a/2350145
        $this->db->query("SELECT SUBSTRING(COLUMN_TYPE,5) as :name
                            FROM information_schema.COLUMNS
                            WHERE TABLE_SCHEMA = :database
                                AND TABLE_NAME = :table
                                AND COLUMN_NAME = :column");
        
        $this->db
            ->bind(":name", "continents")
            ->bind(":database", DB_NAME)
            ->bind(":table", "countries")
            ->bind(":column", "continent");

        $results = [];

        preg_match_all(
            "/'([^']+?)',{0,1}/",
            $this->db->execute()->fetchAll()[0]["continents"],
            $results
        );

        return $results[1];
    }

    public function getCountries()
    {
        $this->db->query("SELECT * FROM `countries`");

        return $this->db->execute()->fetchAll();
    }

    public function getCountry(int $id)
    {
        $this->db->query("SELECT * FROM `countries` WHERE `id` = :id");

        $this->db->bind(":id", $id);

        return $this->db->execute()->fetch();
    }

    public function deleteCountry(int $id)
    {
        $this->db->query("DELETE FROM `countries` WHERE `id` = :id");

        $this->db->bind(":id", $id);

        $this->db->execute();

        return $this;
    }

    public function editCountry(int $id, string $name, string $capitalCity, string $continent, int $population)
    {
        $this->db->query("UPDATE `countries`
                        SET
                            `name` = :name,
                            `capitalCity` = :capitalCity,
                            `continent` = :continent,
                            `population` = :population
                        WHERE `id` = :id");

        $this->db
            ->bind(":name", $name)
            ->bind(":capitalCity", $capitalCity)
            ->bind(":continent", $continent)
            ->bind(":population", $population)
            ->bind(":id", $id);

        $this->db->execute();

        return $this;
    }
}
