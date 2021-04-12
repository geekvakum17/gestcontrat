<?php
class Database {

  private $host = "localhost";
  private $databasename = "gescontrat"; 
  private $username = "root";
  private $password = "";
  private $option=array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_PERSISTENT => true
  );
  private $databaseConnection;
   
  public function __construct() {

    try {
      $this->databaseConnection = new PDO('mysql:host='.$this->host.';port=3306;dbname='.$this->databasename, $this->username, $this->password, $this->option);
    }
    catch(Exception $ex) {
     echo 'connexion à la base de donnee echoue '.$ex->getMessage();
    }
 
  }

  function getconnexion() {
    return $this->databaseConnection;
  }

  function closeConnection() {
    unset($this->databaseConnection);
  }

}