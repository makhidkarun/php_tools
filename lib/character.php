<?php

class Character {
  public function __construct($data = array()) {
    $this->gender = isset($data['gender']) ? $data['gender']  : $this->set_gender();
    $this->name   = isset($data['name'])   ? $data['name']    : $this->get_name($this->gender);
    $this->upp    = isset($data['upp'])    ? $data['upp']     : $this->gen_upp();
    $this->upp_s  = $this->upp_to_s($this->upp);
  }

  public function to_s() {
    $upp_s = $this->upp_to_s($this->upp);
    print("$this->name [$this->gender] $upp_s \n");
  }

  private function set_gender() {
    return rand(0,1) ? "F" : "M";
  }
  private function upp_to_s(array $upp) {
    $string = '';
    foreach ($upp as $s) {
      $string .= dechex($s);
    }
    return strtoupper($string);
  }

  private function roll2() {
    return rand(1,6) + rand(1,6);
  }

  private function gen_upp() {
    for ($i = 1; $i <=6; $i++) {
      $upp[] = $this->roll2();
    }
    return $upp;
  }

  private function get_name($gender) {
    if ($gender == "M") {
      $first_name_table = 'humaniti_male_first';
    } else {
      $first_name_table = 'humaniti_female_first';
    }
    $name = $this->get_rand_data($first_name_table) . " ";

    $last_name_table = 'humaniti_last';
    $name .= $this->get_rand_data($last_name_table);
    return $name;
  }

  private function get_rand_data($table) {
    try {
      $dbh = new PDO("sqlite:data/names.db");
    } catch(PDOException $e) {
      echo $e->getMessage();
      exit;
    }
    $sql    = ("SELECT * from $table ORDER BY RANDOM() LIMIT 1;");
    $stmt   = $dbh->query($sql);
    $result = $stmt->fetch();
    return  $result['name'];
  }
  const STR = 0;
  const EDU = 4;

  private function go_to_school(array $upp) {
    $upp[EDU] += 3;
    return $upp;
  }

  private function go_to_the_gym(array $upp) {
    $upp[STR] +=2;
    return $upp;
  }

}
?>

