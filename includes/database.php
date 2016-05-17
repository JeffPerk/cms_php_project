<?php
////////DECLARING PRIVATE VARIABLES/////////
  class Database {
    private $host;
    private $db_name;
    private $user;
    private $password;

    public $DBH;
    /////////CREATE CONSTRUCT METHOD/////////
    function __construct() {
      $this->host = DB_HOST;
      $this->db_name = DB_NAME;
      $this->user = DB_USER;
      $this->password = DB_PASS;

      $this->connect();
    }

    ////////FUNCTION TO CONNECT TO THE DATABASE//////////
    function connect() {
      try {
        $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->password);
        $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    ///////////SELECT METHOD TO GET DATA////////////
    function select($query) {
      $data = $this->DBH->prepare($query);
      $data->execute();
      $result = $data->fetchAll(PDO::FETCH_ASSOC);
      $num_rows = count($result);
      if($num_rows > 0) {
        return $result;
      } else {
        return false;
      }
    }

    /////////INSERT METHOD TO POST DATA///////////
    function insert($query, $params) {
      $data = $this->DBH->prepare($query);
      $data->execute($params);
      if ($data) {
        return $data;
      } else {
        echo "Data was not inserted.";
      }
    }

    //////////UPDATE METHOD TO UPDATE/PATCH DATA//////////
    function update($query, $params) {
      $data = $this->DBH->prepare($query);
      $data->execute($params);
      if ($data) {
        return $data;
      } else {
        echo "Data did not update.";
      }
    }

    //////////DELETE METHOD TO DELETE DATA/////////
    function delete($query, $params) {
      $data = $this->DBH->prepare($query);
      $data->execute($params);
      if($data) {
        return $data;
      } else {
        echo "Data did not delete.";
      }
    }

  }


 ?>
