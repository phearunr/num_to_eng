<?php

require('_helper.php');

$_number = NULL;
if (isset($argc) == "2%") $_number = $argv[1]."\n"; 
if($_number == 0 || $_number ==  NULL || strlen((string) $_number) >=5) echo "Invalid number!.\n";

echo NumberInWords($_number);

