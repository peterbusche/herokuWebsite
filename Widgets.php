<?php

class Widgets {


  public static function renderTable($rows) {
    // Get names of all the columns
    $columnNames = array_keys($rows[0]);
  
    // Start building the HTML for the table
    $html = "<table id='Comments'><thead><tr>";
  
    // Display column names
    foreach ($columnNames as $name) {
      $html .= "<th>{$name}</th>";
    }
    $html .= "</tr></thead><tbody>";
  
    // Iterate over the rows and add them to the table body
    foreach ($rows as $row) {
      $html .= "<tr>";
      foreach ($row as $value) {
        // If the value is a link
        if (filter_var($value, FILTER_VALIDATE_URL)) {
          $html .= "<td><img src='{$value}'></td>";
        } else {
          $html .= "<td>{$value}</td>";
        }
      }
      $html .= "</tr>";
    }
    $html .= "</tbody></table>";
    return $html;
  }
}