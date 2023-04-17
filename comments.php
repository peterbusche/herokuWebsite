<?php 
include("nav.php"); 
require_once "Widgets.php";
require_once 'Dao.php';

?>
<div id="content3">

   <?php
   if(isset($_SESSION['message'])) {
      echo "<div class='" . $_SESSION['message_type'] . "' id='message'>" . $_SESSION['message'] . " <span class='close'>X</span></div>";
      unset($_SESSION['message']);
   }
   ?>




   Leave a Comment
   <form id="comment_form" method="POST">
     <br/>
     <!--<div>Upload an image: <input type="file" id="myfile" name="myfile" /></div>
     <br/>-->
     <input type="text" id="comment" value="<?php echo isset($_SESSION['inputs']['comment']) ? $_SESSION['inputs']['comment'] : '' ?>" name="comment">
     <input type="submit" value="Submit">
   </form>



   <!-- <form action="process_comment.php" method="POST">
      <label for="comment">Enter your comment:</label>
      <textarea name="comment" id="comment" rows="1" cols="50"></textarea>
      <br>
      <input type="submit" value="Submit">
   </form> -->

   <?php
    $dao = new Dao();
    $comments = $dao->getComments();
    echo Widgets::renderTable($comments);
   ?>

</div>
<?php include("footer.php"); ?>