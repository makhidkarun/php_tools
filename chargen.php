<?php

require 'lib/character.php';
$data['upp']    = [ 3,4,5,6,7,8];
$person = new Character($data);
$person->to_s();
?>
