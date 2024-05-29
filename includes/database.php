<?php
class DatabaseConnection {
  private $host;
  private $username;
  private $password;
  private $dbname;
  private $conn;

  private $user;
  private $pass;

  public function __construct($host, $username, $password, $dbname) {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;

    date_default_timezone_set('Asia/Manila');
  }

  public function connect() {
    try {
      $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
        exit();
      }
    } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
  }

  public function getData2($table, $queries=NULL, $functions) {
    $query = "SELECT * FROM {$table} ";

    if($query) {
      
      if($queries) {
        $lastKey = array_key_last((array)$queries);
        $query .= "WHERE ";

        foreach ($queries as $key => $value) {
          if(count(array($queries)) > 1 && $key === $lastKey) {
            $query .= "AND ";
          }
          $query .= "{$key}='{$value}' ";
        }
      }
      if($functions) {
        foreach ($functions as $key => $value) {
         $query .= "{$key} {$value} ";
        }
      }

      // print_r($query); //don't remove this is for testing use.
      
      $result = $this->conn->query($query);

      return ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : NULL;
    }
  }
  
  public function getRemarks($id) {
    if($id) { $query = (object) array("ref_id"=>$id); }
    
    $functions = (object) array("ORDER BY"=>"timestamp ASC");
    $result = $this->getData2('remarks', $query,  $functions);

    return $result;
  }

  public function postRemarks($user_id, $ref_id, $message) {
    $timestamp = date("m/d/Y G:i:s");

    $query = (object) array(  
      'message' => $message,
      'user_id' => $user_id,
      'ref_id'  => $ref_id,
      // 'timestamp'  => date("m/d/Y G:i:s")
      'timestamp' => $timestamp,
    );

    // print_r($query);?

    $result = $this->saveData('remarks', $query);
    
    return $result;
  }

  public function deleteRemarks($table, $queries) {
    $lastKey = array_key_last((array)$queries);

    $query = "DELETE FROM $table WHERE ";
    
    foreach ($queries as $key => $value) {
      $query .= "{$key}={$value} ";
      if($key !== $lastKey) {
        $query .= "AND ";
      }
    }
    $query .= ';';

    // print_r($query);

    $result = $this->conn->query($query);
    $message = [
      'status' => $result ? 200 : 500,
      'data' => $result ? "Succesfully deleted" : "Failed to delete!"
    ];
    echo json_encode($message);
  }

  public function saveData($table, $queries) {
    if(!$table) return;

    // print_r($queries);

    $keys = array_keys(get_object_vars($queries));
    $values = array_values(get_object_vars($queries));

    
    $query = "INSERT INTO `{$table}` (";
    $query .= implode(', ', $keys);
    $query .= ") VALUES (";
    $query .= '"'.implode('", "',   $values).'"';
    $query .= ");";

    // print_r($query);

    $result = $this->conn->query($query);
    $newId = $this->conn->insert_id;
    $message = [
      'status' => $result ? 200 : 501,
      'message' => $result ? "Succesfully saved" : "Failed to save!", 
      'id' => $newId
    ];
    // echo json_encode($message);
    return $message;
  }

  public function getData($table, $queries) {
    if(!$table) return;

    $lastKey = array_key_last((array)$queries);

    $query = "SELECT * FROM `register` ";
    if($queries) {
     $query .= "WHERE ";
    }
    foreach ($queries as $key => $value) {
      $query .= "{$key}={$value} ";
      if($key !== $lastKey) {
        $query .= "AND ";
      }
    }

    // print_r($query);
  }

  public function countItems($table, $field=NULL, $conditions=NULL) {
    // SELECT count(ref_id) FROM `remarks` WHERE ref_id = 17017;
    if(!$table) return;

    $fault = ($field) ? "count({$field})" : "count(*) ";

    $query = "SELECT $fault FROM `{$table}` ";
    if($conditions) {
      $query .= "WHERE ";
      foreach ($conditions as $field => $value) {
        $query .= "{$field}={$value}";
      }
    }

    // print_r($query);

    $result = $this->conn->query($query);
    return $result->fetch_row()[0];
  }

  public function getUser($queries) {
    if(!$queries) return;

    $username = $queries->username;
    $password = $queries->password;

    $query = "SELECT * FROM `register` ";
    $query .= "WHERE username='{$username}' AND password_1=MD5('{$password}')";

    // print_r($query);

    $result = $this->conn->query($query);

    return ($result->num_rows > 0) ? $result->fetch_array(MYSQLI_ASSOC) : NULL;
  }

  public function pagination($table, $offset, $perPage) {
    if(!$table) return;

    $query = "SELECT * FROM `{$table}` LIMIT $offset, $perPage";
    // print_r($query);
    $result = $this->conn->query($query);

    return ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : NULL;
  }

  public function login($queries) {
    if(!$this->getUser($queries)) return;
    $result = $this->getUser($queries);
    
    $this->user = $result['username'];
    $this->pass = $result['password'];
    
    return $result;
  }

  public function getUsername() {
    return $this->user;
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

// Initialize the DatabaseConnection
$database = new DatabaseConnection("localhost", "root", "", "transto");
// Call the connect function
$database->connect();
