<?php

class View {
  public function __construct($person) {
    $this->person = $person;
  }
  public function to_string() {
    $return_string = "$this->name [$this->gender] $this->upp_s";
    return $return_string;
  }
}
?>

