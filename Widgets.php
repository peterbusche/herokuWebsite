<?php

class Widgets {

   public static function renderTable ($rows) {
      //get names of all the columns
      $columnNames = array_keys($rows[0]); 
      $html = "<table id='Comments'><thead><tr>";
      //display column names
      foreach ($columnNames as $name) {
        $html .= "<th>{$name}</th>";
      }

      $html .= "</tr></thead><tbody>";

      //interate through rows, by individual row
      foreach ($rows as $row) {
        $html .= "<tr>";
        foreach($row as $columnName) {
          if(!empty($columnName['image_path'])) {
            $html .= "<td><img src="<?= $comment['image_path'] ?>" alt="comment image" width="100"></td>";
          }
          // if ($columnName == "image_path") { 
          //   $html .= "<td><img src='{$item}'/></td>";
          // } 
          else {
          $html .= "<td>". htmlspecialchars($columnName) . "</td>";
          }
        }
        $html .= "<td><a href='delete_handler.php?id={$row['id']}'>X</a></td>" ;
        $html .= "</tr>" ;
      }
      $html .= "</table>";
      return $html;
   }
}