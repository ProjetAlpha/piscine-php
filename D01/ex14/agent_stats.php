#!/usr/bin/php
<?php

if ($argc == 1)
  exit;
function calc_moyenne_par_user($arr)
{
  foreach ($arr as $key => $value) {
      $note = array();
      $n_note = 0;
      $total = 0;
      $a = array_filter($arr[$key], function($x) { return $x !== '' && $x != "moulinette"; });
      $average = array_sum($a) / count($a);
      /*foreach ($arr[$key] as $value) {
        if ($key !== "moulinette")
        {
          $total+= intval($value);
          $n_note++;
        }
      }
    if ($n_note !== 0 && $key !== "moulinette")*/
    $moyenne[$key] = $average;
  }
  ksort($moyenne);
  return ($moyenne);
}

function calc_moyenne($arr)
{
  $total = 0;
  $n_note = 0;
  foreach ($arr as $key => $value) {
    //$a = array_filter($arr[$key], function($x) { return $x !== '' && $x != "moulinette"; });
    //$average = array_sum($a) / count($a);
    foreach ($arr[$key] as $value) {
        if ($key !== "moulinette" && $value !== "" && $key !== "")
        {
            $total+= intval($value);
            $n_note++;
        }
    }
  }
  $moyenne = ($total) / ($n_note);
  return ($moyenne);
}

function calc_mouli_moyenne($arr)
{
  $total = 0;
  $n_note = 0;
  foreach ($arr as $key => $value) {
    if ($key == "moulinette")
    {
      foreach ($arr[$key] as $value) {
        $total+= $value;
        $n_note++;
      }
    }
  }
  $moyenne = $total / $n_note;
  return ($moyenne);
}

function is_valid($name_1, $note_1)
{
    return ($name_1 !== "" && $note_1 !== ""
    && $note_1 !== "Note" && $name_1 !== "er");
}

$all = [];
while(($f = fgets(STDIN))){

  $split = explode(";", $f);

  $name_1 = $split[0];
  $note_1 = $split[1];

  $name_2 = $split[2];
  $note_2 = $split[3];

  if ($name_2 == "moulinette")
    $all["moulinette"][] = $note_2;
  if (is_valid(trim($name_1), trim($note_1)))
  {
    if ($name_1 !== "moulinette")
      $all[trim($name_1)][] = trim($note_1);
  }
}
  if ($argv[1] == "moyenne")
  {
    $moyenne = calc_moyenne($all);
    echo "$moyenne\n";
  }else if ($argv[1] == "moyenne_user")
  {
    $moyenne = calc_moyenne_par_user($all);
    foreach ($moyenne as $key => $value) {
      if ($key != "moulinette")
        echo "$key:".$value."\n";
    }
  }else if ($argv[1] == "ecart_moulinette")
  {
    $moyenne = calc_mouli_moyenne($arr);
  }
 ?>
