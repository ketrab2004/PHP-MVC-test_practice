<?php

// singletons:
// https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php

class DatabaseController extends DatabaseModel
{
    public function __construct()
    {
        // call constructor of DatabaseModel
        parent::__construct();
        
        // run getPDO method to make sure that it's set
        $this->getPDO();

        // if error is set
        if (isset($this->error)) {
            throw $this->error; // throw it (all of this class relies on it)
        }

        return $this; // return itself for js like chaining of methods
    }


    /**
     * The query() method takes a string as an argument and prepares the query for execution
     * @param string $query query to use,
     * example: "INSERT INTO people_table (`name`, `age`) VALUES (:name, :age);"
     * 
     * @return static return itself for js like chaining of methods
     */
    public function query(string $query): static
    {
        $this->stmt = $this->getPDO()->prepare($query);
        
        return $this;
    }


    /**
     * The bind() method binds the value to the parameter marker and stores the value in an array for later execution.
     * 
     * @param string $param the parameter marker to be replaced,
     * example: `":name"`
     * @param mixed $value the value to replace the marker with,
     * example: `"Johny"`
     * @param ?int $type Type of the value to bind,
     * example: `PDO::PARAM_STR`
     * 
     * @return static return itself for js like chaining of methods
     */
    public function bind(string $param, mixed $value, ?int $type = null): static
    {
        // if no type given
        if (is_null($type)) {
            // switch case to turn string from gettype() into a PDO::PARAM_??? enum int
            switch (gettype($value)) {
                case "integer":
                    $type = PDO::PARAM_INT;
                    break;

                case "boolean":
                    $type = PDO::PARAM_BOOL;
                    break;

                case "NULL":
                    $type = PDO::PARAM_NULL;
                    break;

                case "string":
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);

        return $this;
    }


    /**
     * Fetch the first result
     * 
     * `execute()` must be called first!
     * 
     * @return array associative array with the result
     */
    public function fetch(): array
    {
        $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
        return !$result ? throw new Exception("No result found") : $result;
    }


    /**
     * Fetch all results
     * 
     * `execute()` must be called first!
     * 
     * @return array associative array with the results
     */
    public function fetchAll(): array
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Executes the setup query
     * @throws PDOException
     * @return static return itself for js like chaining of methods
     */
    public function execute(): static
    {
        $this->stmt->execute();

        return $this;
    }


    /**
     * Returns the number of rows in the resultset
     * 
     * @return int number of rows
     */
    public function rowCount(): int
    {
        return $this->stmt->rowCount();
    }


    /**
     * Returns the ID of the last inserted row
     * 
     * @return string the ID of the last inserted row
     */
    public function lastInsertId(): string
    {
        return $this->getPDO()->lastInsertId();
    }


    /**
     * Begins a transaction
     *
     * Turns off autocommit mode,
     * during the transaction all changes to the database won't be
     * committed until `endTransaction()` is called.
     * 
     * Calling `cancelTransaction()` instead will cancel all changes,
     * and turn autocommit mode back on.
     * 
     * @throws PDOException if a transaction is already active, or the current driver does not support transactions
     *
     * @return bool whether it succeeded
     */
    public function beginTransaction(): bool
    {
        return $this->getPDO()->beginTransaction();
    }


    /**
     * Stops the transaction,
     * commits all changes made during it to the database
     * and enables autocommit mode again.
     * @see beginTransaction()
     * 
     * @throws PDOException if no transaction is active
     * 
     * @return bool whether it succeeded
     */
    public function endTransaction(): bool
    {
        return $this->getPDO()->commit();
    }


    /**
     * Cancels all changes made during the transaction,
     * and turns autocommit mode back on.
     * @see beginTransaction()
     * 
     * @throws PDOException if no transaction is active
     *
     * @return bool whether it succeeded
     */
    public function cancelTransaction(): bool
    {
        return $this->getPDO()->rollBack();
    }


    /**
     * Prints the prepared query and the bound parameters.
     *
     * Dumps the information contained by a prepared statement directly on the output.
     * It will provide the SQL query in use,
     * the number of parameters used (Params),
     * the list of parameters with their key name or position,
     * their name, their position in the query (if this is supported by the PDO driver, otherwise, it will be -1),
     * type (param_type) as an integer, and a boolean value is_param.
     *
     * This is a debug function, which dumps the data directly to the normal output.
     * @return static return itself for js like chaining of methods
     */
    public function debugDumpParams(): static
    {
        $this->stmt->debugDumpParams();

        return $this;
    }
}
