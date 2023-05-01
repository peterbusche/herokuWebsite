<?php
require_once 'Dao.php';

class Widgets {
  function renderTable() {
    $dao = new Dao();
    $comments = $dao->getComments();
    foreach ($comments as $comment) {
      echo "<div>";
      echo "<h3>" . htmlspecialchars($comment['username']) . "</h3>";
      echo "<p>" . htmlspecialchars($comment['comment']) . "</p>";
      if (!empty($comment['image_url'])) {
        echo "<img src='" . htmlspecialchars($comment['image_url']) . "' alt='Comment Image'>";
      }
      echo "<p>" . htmlspecialchars($comment['created_at']) . "</p>";
      echo "</div>";
    }
  }
}