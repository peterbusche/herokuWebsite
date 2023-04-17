<?php
require_once('Dao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $comment = $_POST['comment'];
  $pdo = new Dao();
  $pdo->saveComment($comment);
  header('Location: comments.php');
  exit;
}
?>
