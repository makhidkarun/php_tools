<?php

const STR = 0;
const EDU = 4;

function go_to_school(array $upp) {
  $upp[EDU] += 3;
  return $upp;
}

function go_to_the_gym(array $upp) {
  $upp[STR] +=2;
  return $upp;
}

function roll2() {
  return random_int(1,6) + random_int(1,6);
}

function upp_s(array $upp) {
  $string = '';
  foreach ($upp as $s) {
    $string .= dechex($s);
  }
  return strtoupper($string);
}

function gen_upp() { 
  for ($i = 1; $i <=6; $i++) {
    $upp[] = roll2();
  }
  return $upp;
}

function get_name(string $gender) {
  if ($gender == "M") {
    $first_name_table = 'humaniti_male_first';
  } else {
    $first_name_table = 'humaniti_female_first';
  }
  $name = get_rand_data($first_name_table) . " ";

  $last_name_table = 'humaniti_last';
  $name .= get_rand_data($last_name_table);
  return $name;
}

function get_rand_data(string $table) {
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

$upp      = gen_upp();
$char_upp = upp_s($upp);
$gender   = random_int(0,1) ? "F" : "M";
$name     = get_name($gender);

print("Before school and gym: $char_upp.\n");
$upp = go_to_school($upp);
$upp = go_to_the_gym($upp);
$char_upp = upp_s($upp);
print("$name [$gender]  $char_upp.\n");

?>
