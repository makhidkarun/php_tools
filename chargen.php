<?php

require 'lib/character.php';
require 'lib/view.php';

$person = new Character();
$this_person = new View($person);
print("Your new crew: {$this_person}\n");

