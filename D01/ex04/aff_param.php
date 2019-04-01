#!/usr/bin/php
<?php
  $i = 1;
  while ($i < $argc)
  {
    $param = $argv[$i];
    echo "$param\n";
    $i++;
  }
 ?>
