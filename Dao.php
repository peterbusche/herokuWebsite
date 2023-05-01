<?php
// Dao.php
// class for saving and getting comments from MySQL
class Dao {

  private $host = "us-cdbr-east-06.cleardb.net";
  private $db = "heroku_b4be0a7ca8e3823";
  private $user = "bb94a3d0d4155a";
  private $pass = "8bed8fba";

  // private $dsn = "mysql:dbname=heroku_b4be0a7ca8e3823;host=us-cdbr-east-06.cleardb.net";


  public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
  }

  public function deleteComment ($id) {
      $conn = $this->getConnection();
      $deleteComment =
          "DELETE FROM comments
          WHERE id = :id";
      $q = $conn->prepare($deleteComment);
      $q->bindParam(":id", $id);
      $q->execute();
  }


  //----------------KEEP----------------------
  public function saveComment ($comment, $image_url) {

    //if both are empty return
    if (empty($comment) && empty($image_url)) {
      return;
    }

    $conn = $this->getConnection();
    $q = $conn->prepare("INSERT INTO comments (comment, image_url, created_at) VALUES (:comment, :image_path, NOW())");
    //make sure comment isnt empty
    
    $q->bindParam(':comment', $comment);
    $q->bindParam(':image_path', $image_url);
    $q->execute();
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT comment, image_url, created_at, id FROM comments ORDER BY created_at desc")->fetchAll(PDO::FETCH_ASSOC);
  }

} // end Dao