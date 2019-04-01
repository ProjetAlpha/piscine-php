#!/usr/bin/php
<?php
  if ($argc < 3)
    exit;
  $search = $argv[1];
  $arr = array();
  $i = 2;
  while ($i < $argc)
  {
    $split = explode(":", $argv[$i]);
    $key = $split[0];
    $value = $split[1];
    $arr[][$key] = $value;
    $i++;
  }
  foreach ($arr as $subarr){
      foreach ($subarr as $key => $value) {
          if (strcmp($key, $search) == 0)
          {
            $res[] = $value;
          }
      }
  }
  if (isset($res))
  {
    $last = end($res);
    echo "$last\n";
  }
?>
