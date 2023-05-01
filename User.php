<?php
class User{

  public $name; 
  public $ID; 

  private $password = "poop";

  public function __construct($name, $ID) {
    $this->name = $name;
    $this->ID = $ID;
  }

  public function authenticate ($password) {
    return ($this->password == $password);
  }

  public function setPassword ($password) {
    $this->password = $password;
  }

}