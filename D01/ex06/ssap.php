#!/usr/bin/php
<?php
  if ($argc > 1)
  {
    $i = 1;
    $arr = array();
    while ($i < $argc)
    {
      $normalize = trim(preg_replace('/\s+/', ' ', $argv[$i]));
      $res = explode(" ", $normalize);
      foreach ($res as $value) {
          $arr[] = $value;
      }
      $i++;
    }
    sort($arr);
    foreach ($arr as $value) {
      echo "$value\n";
    }
  }
 ?>
