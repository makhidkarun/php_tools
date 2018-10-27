<?php

class Character {
  public function __construct($data) {
    $this->name   = $data['name']; 
    $this->gender = $data['gender'];
    $this->upp    = $data['upp'];
  }

  public function to_s() {
    $upp_s = $this->upp_to_s($this->upp);
    print("$this->name [$this->gender] $upp_s \n");
  }

  public function upp_to_s(array $upp) {
    $string = ''; 
    foreach ($upp as $s) {
      $string .= dechex($s);
    }
    return strtoupper($string);
  }
}

?>

