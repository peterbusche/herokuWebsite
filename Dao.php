<?php

class Dao {
  private $host = "us-cdbr-east-06.cleardb.net";
  private $db = "heroku_b4be0a7ca8e3823";
  private $user = "bb94a3d0d4155a";
  private $pass = "8bed8fba";
  private $pdo;

  function __construct() {
    $dsn = "mysql:host=$this->host;dbname=$this->db;charset=utf8mb4";
    $this->pdo = new PDO($dsn, $this->user, $this->pass);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  function getConnection() {
    return $this->pdo;
  }

  function saveComment($comment, $image_url) {
    $stmt = $this->pdo->prepare("INSERT INTO comments (user_id, comment, image_url) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $comment, $image_url]);
  }

  function deleteComment($id) {
    $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = ?");
    $stmt->execute([$id]);
  }

  function getComments() {
    $stmt = $this->pdo->query("SELECT comments.id, comments.comment, comments.image_url, comments.created_at, users.username FROM comments JOIN users ON comments.user_id = users.id ORDER BY comments.created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}