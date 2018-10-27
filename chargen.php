<?php

function roll2() {
  return random_int(1,6) + random_int(1,6);
}

function upp_s(array $upp) {
  $stats = ['str', 'dex', 'end', 'int', 'edu', 'soc'];
  $string = '';
  foreach ($stats as $s) {
    $string .= dechex($upp[$s]);
  }
  return strtoupper($string);
}

function gen_upp() { 
  $stats = ['str', 'dex', 'end', 'int', 'edu', 'soc'];
  $upp = [];
  foreach ($stats as $s) {
    $upp[$s] = roll2();
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

print("$name [$gender]  $char_upp.\n");

?>
