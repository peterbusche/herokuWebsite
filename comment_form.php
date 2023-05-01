
<div>
   <form action="comments.php" method="POST" enctype="multipart/form-data">
      <label for="comment">Leave a Comment</label>
      <textarea name="comment" id="comment" rows="1" cols="50"></textarea>
      <br>
      <label for="image_path">Upload an Image:</label>
      <input type="file" name="image_path" id="image_path"> 
      <br>
      <input type="submit" value="Submit" name="submit">
   </form>

   <?php
    include("Dao.php");
    $dao = new Dao();
    $comments = $dao->getComments();
    echo Widgets::renderTable($comments);
   ?>
</div>

<!-- <div id="content3">
   <form action="process_comment.php" method="POST" enctype="multipart/form-data">
      <label for="comment">Leave a Comment</label>
      <textarea name="comment" id="comment" rows="1" cols="50"></textarea>
      <br>
      <label for="image_path">Upload an Image:</label>
      <input type="file" name="image_path" id="image_path"> 
      <br>
      <input type="submit" value="Submit">
   </form>

   
    <?php
//   $dao = new Dao();
//    $comments = $dao->getComments();
//    echo Widgets::renderTable($comments);
   ?> 
   
</div> -->