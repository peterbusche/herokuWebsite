
<?php session_start(); ?>
<form method="POST" action="submit_comment.php" enctype="multipart/form-data">
  <textarea name="comment"></textarea>
  <input type="file" name="image">
  <input type="submit" value="Submit">
</form>