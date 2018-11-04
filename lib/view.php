<?php

class View {
  protected $person;

  public function __construct(Character $person) {
    $this->person = $person;
  }

  public function __toString() {
    $return_string = "Your new crew: {$this->person}\n";
    return $return_string;
  }
}
