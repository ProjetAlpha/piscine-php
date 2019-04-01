#!/usr/bin/php
<?php

date_default_timezone_set('Europe/Paris');

function create_line($data)
{
  $str = "";
  if (isset($data['name']))
    $str.=trim($data['name']). " ";
  if (isset($data['line']))
    $str.=trim($data['line'])."  ";
  if (isset($data['time1']))
    $str.=date("M  j H:i", trim($data['time1']))." ";
  return ($str);
}

$content = file_get_contents('/var/run/utmpx');
$user = substr($content, 2512);
$data = unpack("a256name/a4id/a32line/ipid/ie/I2time/a256g/i16space", $user);
$res[] = create_line($data);

$content = substr($content, 1256);
$len = mb_strlen($content , 'UTF-8');
$i = 0;
while ($i < $len)
{
  $data = unpack("a256name/a4id/a32line/id/ie/I2time/a256g/i16h", $content);
  if ($i > 0)
    $res[] = create_line($data);
  $content = substr($content, $i);
  $i+=628;
}

sort($res);
foreach ($res as $value) {
  echo $value. PHP_EOL;
}

?>
