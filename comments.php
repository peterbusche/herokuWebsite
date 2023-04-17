<?php 
include("nav.php"); 
require_once "Widgets.php";
require_once 'Dao.php';

?>
<div id="content3">

   <!-- <?php
   // if(isset($_SESSION['message'])) {
   //    echo "<div class='" . $_SESSION['message_type'] . "' id='message'>" . $_SESSION['message'] . " <span class='close'>X</span></div>";
   //    unset($_SESSION['message']);
   // }
   ?> -->



   


   <form action="process_comment.php" method="POST" enctype="multipart/form-data">
      <label for="comment">Leave a Comment</label>
      <textarea name="comment" id="comment" rows="1" cols="50"></textarea>
      <br>
      <label for="image_path">Upload an Image:</label>
      <input type="file" id="myfile" name="myfile">
      <br>
      <input type="submit" value="Submit">
   </form>

   <?php
    $dao = new Dao();
    $comments = $dao->getComments();
    echo Widgets::renderTable($comments);
   ?>

</div>
<?php include("footer.php"); ?>