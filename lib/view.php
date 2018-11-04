<?php

class View {
  protected $person;

  public function __construct(Character $person) {
    $this->person = $person;
  }

  public function __toString() {
    $return_string = "{$this->person->name} [{$this->person->gender}] {$this->person->upp_s}";
    return $return_string;
  }
}
