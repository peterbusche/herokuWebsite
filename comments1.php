<?php 
include("nav.php"); 
require_once "Widgets.php";
?>

<?php
include("Dao.php");
$dao = new Dao();

if(isset($_POST['submit'])) {
    $comment = $_POST['comment'];
    $image_path = $_FILES['image_path']['name'];
    $tmp_name = $_FILES['image_path']['tmp_name'];
    $error = $_FILES['image_path']['error'];

    // Check for comment and image upload
    if (empty($comment) && empty($image_path)) {
      echo "Please leave a comment or upload an image.";
    } else {
        // Save comment and image to database
        if($error === 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($image_path);
            move_uploaded_file($tmp_name, $target_file);
            $dao->saveComment($comment, $target_file);
        } else {
            $dao->saveComment($comment, "");
        }
        header("Location: comment_form.php");
    }
}

include("comment_form.php");
?>





<?php include("footer.php"); ?>