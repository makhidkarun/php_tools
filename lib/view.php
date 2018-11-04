<?php

class View {
  protected $person;

  public function __construct(Character $person) {
    $this->person = $person;
  }

  public function __toString() {
    $return_string = "{$this->person}";
    return $return_string;
  }
}
