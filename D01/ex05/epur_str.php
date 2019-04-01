#!/usr/bin/php
<?php
  if ($argc == 2)
  {
    $normalize = preg_replace('/\s+/', ' ', $argv[1]);
    $trim = trim($normalize);
    echo "$trim\n";
  }

 ?>
