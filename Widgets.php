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
    //display rows
    foreach ($rows as $row) {
        $html .= "<tr>";
        foreach ($row as $key => $value) {
            if ($key === 'image_path') {
                $html .= "<td><img src='$value' width='100'></td>";
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