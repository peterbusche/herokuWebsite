<?php
require_once('Dao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $comment = $_POST['comment'];
  $image_path = null;

  if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['image_path']['tmp_name'];
    $name = basename($_FILES['image_path']['name']);
    $image_path = "uploads/$name";
    move_uploaded_file($tmp_name, $image_path);
  }


  $pdo = new Dao();
  $pdo->saveComment($comment, $image_path);
  header('Location: comments.php');
  exit;
}



?>
