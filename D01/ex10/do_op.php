#!/usr/bin/php
<?php
  if ($argc == 1)
  {
    echo "Incorrect Parameters\n";
    exit;
  }
    if (trim($argv[2]) == "+")
      $res = intval(trim($argv[1])) + intval(trim($argv[3]));
    else if (trim($argv[2]) == "-")
      $res = intval(trim($argv[1])) - intval(trim($argv[3]));
    else if (trim($argv[2]) == "*")
      $res = intval(trim($argv[1])) * intval(trim($argv[3]));
    else if (trim($argv[2]) == "/")
      $res = intval(trim($argv[1])) / intval(trim($argv[3]));
    else if (trim($argv[2]) == "%")
      $res = intval(trim($argv[1])) % intval(trim($argv[3]));
    echo "$res\n";
 ?>
