<?php

require '../lib/character.php';
require '../lib/view.php';

#$data_string = file_get_contents('data/soldiers.json');
$data_string = file_get_contents('data/people_dragons_20180303.json');
$ds_array = json_decode($data_string, true);

foreach ($ds_array as $key => $person ) {
  $p = new Character($person);
  $this_p = new View($p);
  print("New crew: $this_p\n");
}
