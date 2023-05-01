<?php
include("Dao.php");
$dao = new Dao();

if(isset($_POST['submit'])) {
    $comment = $_POST['comment'];
    $image_path = $_FILES['image_path']['name'];
    $tmp_name = $_FILES['image_path']['tmp_name'];
    
    // move uploaded file to a permanent location
    $upload_path = "uploads/" . basename($image_path);
    move_uploaded_file($tmp_name, $upload_path);
    
    // insert comment and image path into database
    $dao->insertComment($comment, $upload_path);
}

$comments = $dao->getComments();
echo Widgets::renderTable($comments);
?>
