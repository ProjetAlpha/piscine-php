#!/usr/bin/php
<?php
  if ($argc > 1)
  {
    $normalize = trim(preg_replace('/\s+/', ' ', $argv[1]));
    $split = explode(" ", $normalize);
    $len = count($split);
    $tmp = $split[0];
    $i = 1;
    while ($i < $len)
    {
      $value = $split[$i];
      echo "$value";
      echo " ";
      $i++;
    }
    echo $tmp;
    echo "\n";
  }
 ?>
