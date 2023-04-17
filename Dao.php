<?php
// Dao.php
// class for saving and getting comments from MySQL
class Dao {

  private $host = "us-cdbr-east-06.cleardb.net";
  private $db = "heroku_b4be0a7ca8e3823";
  private $user = "bb94a3d0d4155a";
  private $pass = "8bed8fba";

  // private $dsn = "mysql:dbname=heroku_b4be0a7ca8e3823;host=us-cdbr-east-06.cleardb.net";

  // try {
  //   $dbh = new PDO($dsn, $user, $password);
  //   echo "it worked!";
  // } catch(PDOException $e) {
  //   echo 'connection failed: ' . $e->getMessage();
  // }

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

  public function saveComment ($comment, $imagePath = "") {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO comments
        (comment, image_path)
        VALUES
        (:comment, :image_path)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":image_path", $imagePath);
    $q->execute();
  }

  //----------------KEEP----------------------
  // public function saveComment ($comment) {
  //   $conn = $this->getConnection();

  //   $q = $conn->prepare("INSERT INTO comments (comment, date_entered) VALUES (:comment, :date_entered)");
  //   $q->bindValue(':comment', $comment, PDO::PARAM_STR);
  //   $q->bindValue(':date_entered', date('Y-m-d H:i:s'), PDO::PARAM_STR);
  //   $q->execute();

  // }

    //------------------DELETE---------------------
//   public function saveComment($comment) {
//     $pdo = $this->getConnection();
//     $stmt = $pdo->prepare("INSERT INTO comments (comment, date_entered) VALUES (:comment, :date_entered)");
//     $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
//     $stmt->bindValue(':date_entered', date('Y-m-d H:i:s'), PDO::PARAM_STR);
//     $stmt->execute();
//     return $pdo->lastInsertId();
// }


  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT comment, date_entered, id FROM comments ORDER BY date_entered desc")->fetchAll(PDO::FETCH_ASSOC);
  }

} // end Dao