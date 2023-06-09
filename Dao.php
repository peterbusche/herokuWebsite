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
  //----------------------TEACHERS VERSION-------------------------------
  // public function saveComment ($comment, $imagePath = "") {
  //   $conn = $this->getConnection();
  //   $saveQuery =
  //       "INSERT INTO comments
  //       (comment, image_path)
  //       VALUES
  //       (:comment, :image_path)";
  //   $q = $conn->prepare($saveQuery);
  //   $q->bindParam(":comment", $comment);
  //   $q->bindParam(":image_path", $imagePath);
  //   $q->execute();
  // }
  //----------------KEEP----------------------
  public function saveComment ($comment, $image_path) {
    //if both are empty return
    if (empty($comment) && empty($image_path)) {
      return;
    }
    $conn = $this->getConnection();
    $q = $conn->prepare("INSERT INTO comments (comment, image_path, date_entered) VALUES (:comment, :image_path, NOW())");
    //make sure comment isnt empty
    if (!empty($comment)) {
        $q->bindParam(':comment', $comment);
    }

    if (!empty($image_path)) {
      $q->bindParam(':image_path', $image_path);
    }
    return $q->execute();
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT comment, image_path, date_entered, id FROM comments ORDER BY date_entered desc")->fetchAll(PDO::FETCH_ASSOC);
  }
} // end Dao