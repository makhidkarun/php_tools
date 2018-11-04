<?php

require 'lib/character.php';
require 'lib/view.php';

$person = new Character();
#print("$person->name [$person->gender] $person->upp_s\n");
$this_person = new View($person);
print("Your new crew: $this_person->to_string .\n");
?>
