<?php

require_once('Dao.php');

$dao = new Dao();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the comment and image path from the form
    $comment = trim($_POST['comment']);
    $image_path = trim($_POST['image_path']);

    // Make sure the comment is not empty
    if (!empty($comment) || !empty($image_path)) {
        // Save the comment and image path to the database
        $dao->saveComment($comment, $image_path);
    }
}

// Redirect back to comments.php
header('Location: comments.php');
exit();
















// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   $comment = $_POST['comment'];
//   $image_path = null;

//   if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] == UPLOAD_ERR_OK) {
//     $tmp_name = $_FILES['image_path']['tmp_name'];
//     $name = basename($_FILES['image_path']['name']);
//     $image_path = "uploads/$name";
//     move_uploaded_file($tmp_name, $image_path);
//   }


//   $pdo = new Dao();
//   $pdo->saveComment($comment, $image_path);
//   header('Location: comments.php');
//   exit;





// $dao = new Dao();

// $comment = $_POST["comment"];
// $image_path = $_POST["image_path_url"];

// if (!empty($comment) || !empty($image_path)) {
//   $dao->saveComment($comment, $image_path);
// }

// header("Location: comments.php");
// exit();

