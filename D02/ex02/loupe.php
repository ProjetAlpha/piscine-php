#!/usr/bin/php
<?php

if ($argc == 2)
{
  $file = file_get_contents($argv[1]);

  preg_match_all('/<a [^>]*(.*?)<\/a>/s', $file, $matches, PREG_OFFSET_CAPTURE);
  $tmp = $file;
  $links = $matches[0];
  foreach ($links as $link) {
    $i = 0;
    $pos = $link[1];
    $res = $link[0];

    if (preg_match_all('/>(.*?)</s', $res, $inner_tag, PREG_OFFSET_CAPTURE))
    {
      $all_tags = $inner_tag[1];
      foreach ($all_tags as $value) {
          $pos_3 = $value[1];
          $calc_pos_2[] = $pos_3 + $pos;
          $strings_2[] = $value[0];
      }
    }
    if (preg_match_all('/title=\"(.*?)\"/s', $res, $title, PREG_OFFSET_CAPTURE))
    {
        $match = $title[1];
        $i = 0;
        foreach ($match as $value) {
            $pos_2 = $value[1];
            $calc_pos[] = $pos_2 + $pos;
            $end[] = $pos_2 + strlen($value[0]);
            $strings[] = $value[0];
        }
    }
  }

    $new_string = substr_replace($tmp, strtoupper($strings[0]), $calc_pos[0], strlen($strings[0]));
    $tmp_str = $new_string;
    for($i = 1; $i < count($strings); $i++)
    {
        $new_string = substr_replace($tmp_str, strtoupper($strings[$i]), $calc_pos[$i], strlen($strings[$i]));
        $tmp_str = $new_string;
    }

    $new_string = substr_replace($new_string, strtoupper($strings_2[0]), $calc_pos_2[0], strlen($strings_2[0]));
    $tmp_str = $new_string;
    for($i = 1; $i < count($strings_2); $i++)
    {
        $new_string = substr_replace($tmp_str, strtoupper($strings_2[$i]), $calc_pos_2[$i], strlen($strings_2[$i]));
        $tmp_str = $new_string;
    }
    echo $new_string;
}
 ?>
