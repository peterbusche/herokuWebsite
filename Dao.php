<?php
// Dao.php
// class for saving and getting comments from MySQL
class Dao {

  private $host = "us-cdbr-east-06.cleardb.net";
  private $db = "heroku_b4be0a7ca8e3823";
  private $user = "bb94a3d0d4155a";
  private $pass = "8bed8fba";

  public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
  }

} // end Dao