#!/usr/bin/php
<?php

if ($argc == 2)
{
  $file = file_get_contents($argv[1]);

  preg_match_all('/<img.*?src="([^"]+)".*?>/', $file, $arr, PREG_PATTERN_ORDER);
  $is_link = 0;
  preg_match('/([a-z0-9\-\.]*)\.(([a-z]{2,4})|([0-9]{1,3}\.([0-9]{1,3})\.([0-9]{1,3})))/', $argv[1], $match_host);
  $host = $match_host[0];
  preg_match('/(https|http)/', $argv[1], $match_scheme);
  $scheme = $match_scheme[1];
  if (!isset($host) || !isset($scheme))
  {
    echo "Not a valid link !\n";
    exit ;
  }
  $dir = $host;
  if (!file_exists($dir))
    mkdir($dir, 0777, true);
  $match = $arr[1];
  foreach ($match as $key => $value) {
    $is_link = 0;
    if (preg_match('/(https?:\/\/)?(www\.)?\w+\.[a-z]{2,6}(\/)?/', $value, $matches))
    {
      $match_type = $matches[1];
      if (isset($match_type))
      {
        if ($match_type == "http://" || $match_type == "https://")
          $is_link = 1;
      }
    }
    if ($is_link == 1)
    {
      $file_name = array_pop(explode('/', $value));
      $content = file_get_contents($value);
      if (isset($content) && isset($file_name))
        file_put_contents($dir.'/'.$file_name, $content);
    }else {
      $content = file_get_contents($scheme.'://'.$dir.$value);
      $file_name = array_pop(explode('/', $value));
      if (isset($content) && isset($file_name))
        file_put_contents($dir.'/'.$file_name, $content);
    }
  }
}
 ?>
