<?php 
class DatabaseConnection {
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;

    function __construct($dbhost, $dbuser, $dbpass, $dbname)
    {
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
    }

    function executeQuery($query) {
        $pdo = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

        $unbufferedResult = $pdo->query($query);
        return $unbufferedResult;
    }
}