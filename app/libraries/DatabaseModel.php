<?php

abstract class DatabaseModel
{
    protected bool $isLocalHost;
    private string $host = DB_HOST;
    private string $dbName = DB_NAME;
    private string $user = DB_USER;
    private string $pass = DB_PASS;

    protected PDOStatement $stmt;
    protected string $error;

    private static PDO $dbh; // static so that all databaseControllers use the same PDO


    // setup connection data
    protected function __construct()
    {
        // https://stackoverflow.com/a/2053295
        $this->isLocalHost = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
    }


    // getter method for static $dbh
    protected function getPDO(): PDO
    {
        // if static dbh variable is not set
        if (!isset(static::$dbh))
        {
            //prepare dsn
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;

            //set settings for PDO
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try {
                static::$dbh = new PDO($dsn, $this->user, $this->pass, $options); // make PDO and set static variable to it
            } //catch any errors
            catch (PDOException $e) {
                $this->error = $e->getMessage();
            }
        }

        // return static dbh variable (newly created if it wasn't set before)
        return static::$dbh; // $dbh is a static variable, so you have to replace $this-> with static::
    }


    /**
     * getter method for statement error info
     * 
     * @return array error information about the last operation performed by this database handle.
     * The array consists of the following fields:
     * Element Information 0 SQLSTATE error code (a five characters alphanumeric identifier defined in the ANSI SQL standard).
     * 1 Driver-specific error code.
     * 2 Driver-specific error message.
     */
    public function getQueryError(): array
    {
        return $this->getPDO()->errorInfo();
    }
}
