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
      if ($value >= 0 && is_numeric($value) && !ctype_alpha($value))
        $arr_n[] = $value;
      else if (ctype_alpha($value) && !is_numeric($value))
        $arr_str[] = $value;
      else {
        $arr_other[] = $value;
      }
    }
    $i++;
  }
  if (isset($arr_str) && is_array($arr_str))
  {
	natcasesort($arr_str);
 	foreach ($arr_str as $value) {
    	echo "$value\n";
  	}
  }
  if (isset($arr_n) && is_array($arr_n))
  {
	sort($arr_n, SORT_STRING);
	foreach ($arr_n as $value) {
    	echo "$value\n";
  	}
 }
  if (isset($arr_other) && is_array($arr_other))
  {
	natcasesort($arr_other);
	foreach ($arr_other as $value) {
    	echo "$value\n";
  	}
  }
}
?>
