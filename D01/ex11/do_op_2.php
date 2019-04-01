#!/usr/bin/php
<?php
  if ($argc == 1)
  {
    echo "Incorrect Parameters\n";
    exit;
  }

  $trim = trim(preg_replace('/\s+/', '', $argv[1]));
  $len = strlen($trim);
  $first = intval($trim);
  $sign = $trim[strlen($first)];
  $second = intval(substr($trim, strlen($first) + strlen($sign), strlen($trim)));

  if (strlen($first) + strlen($second) + strlen($sign) != strlen($trim))
  {
    echo "Syntax Error\n";
    exit;
  }
  if ($sign == '+')
    $res = $first + $second;
  else if ($sign == '-')
    $res = $first - $second;
  else if ($sign == '*')
    $res = $first * $second;
  else if ($sign == '/')
    $res = $first / $second;
  else if ($sign == '%')
    $res = $first % $second;
  echo "$res\n";
 ?>
