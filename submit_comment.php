<?php
session_start();
require_once 'Dao.php';

if (isset($_SESSION['user_id'])) {
  if (isset($_POST['comment'])) {
    $dao = new Dao();
    $comment = $_POST['comment'];
    $image_url = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      $tmp_name = $_FILES['image']['tmp_name'];
      $name = basename($_FILES['image']['name']);
      $ext = pathinfo($name, PATHINFO_EXTENSION);
      $new_name = uniqid() . ".$ext";
      move_uploaded_file($tmp_name, "uploads/$new_name");
      $image_url = "uploads/$new_name";
    }
    $dao