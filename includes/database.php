<?php
class DatabaseConnection {
  private $host;
  private $username;
  private $password;
  private $dbname;
  private $conn;

  public function __construct($host, $username, $password, $dbname) {
      $this->host = $host;
      $this->username = $username;
      $this->password = $password;
      $this->dbname = $dbname;
  }

  public function connect() {
    try {
      $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
      // $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
      // if ($this->conn->connect_error) {
      //     die("Connection failed: " . $this->conn->connect_error);
      //     exit();
      // }
  }

  public function getUsers($id) {
      $query = "SELECT * FROM users WHERE id = '$id'";
      $result = $this->conn->query($query);
      if ($result->num_rows > 0) {
          return $result->fetch_assoc();
      } else {
          return null;
      }
  }

  public function closeConnection() {
      $this->conn->close();
  }
}
