<?php
/*
 * PDO Database class
 * Connect to Database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pwd = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
        //Set dsn
        $dsn = 'mysql:host=' . $this->host .';dbname=' . $this->dbname;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pwd, $options);
        } catch (PDOexception $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare Statements
    public function query($sql) {
        try {
        $this->stmt = $this->dbh->prepare($sql);
        } catch (PDOexception $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Bind Statements
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch(true) {
                case is_int($type):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($type):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($type):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        try {
        $this->stmt->bindValue($param, $value, $type);
        } catch (PDOexception $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    // Execute the Prepared Statements
    public function execute() {
        try{
        return $this->stmt->execute();
    }
        catch (PDOexception $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    // Get result set as an array of objects
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    // Get single record as objects
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    // Get num_rows 
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}