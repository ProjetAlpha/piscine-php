#!/usr/bin/php
<?php

date_default_timezone_set('GMT');

if ($argc == 1)
  exit;

function error($str)
{
  echo "$str\n";
  exit;
}

function check_days($month, $day)
{
  if ($day <= 0)
    error("Wrong Format");
  if ($month == "Janvier" || $month == "Mars" || $month == "Mai" || $month == "Juillet"
  || $month == "Aout" || $month == "Octobre" || $month == "Decembre")
  {
    if ($day > 31)
      error("Wrong Day Format");
  }

  if ($month == "Janvier" || $month == "Mars" || $month == "Mai" || $month == "Juillet"
  || $month == "Aout" || $month == "Octobre" || $month == "Decembre")
  {
    if ($day > 31)
      error("Wrong Day Format");
  }

  if ($month == "Septembre" || $month == "Novembre" || $month == "Avril" || $month == "Juin")
  {
    if ($day > 30)
      error("Wrong Day Format");
  }

  if ($month == "septembre" || $month == "novembre" || $month == "avril" || $month == "juin")
  {
    if ($day > 30)
      error("Wrong Day Format");
  }

  if ($month == "fevrier" || $month == "Fevrier")
  {
    if ($day > 29)
      error("Wrong Day Format");
  }
}

function get_data($str)
{
  if (substr_count(trim($str), ' ') != 4)
    error("Wrong Format");

  $data = [];
  $find = 0;
  $days = ["Lundi","lundi","Mardi","mardi", "Mercredi", "mercredi", "Jeudi", "jeudi",
  "Vendredi", "vendredi", "Samedi", "samedi", "Dimanche", "dimanche"];
  $month = ["Janvier", "janvier", "Fevrier", "fevrier", "Mars", "mars", "Avril", "avril", "Mai", "mai",
  "Juin", "juin", "Juillet", "juillet", "aout", "Aout", "Septembre", "septembre", "Octobre", "octobre", "Novembre", "novembre",
  "decembre", "Decembre"];

  for ($i = 0; $i < count($days); $i++)
  {
      if (strpos($str, $days[$i]) !== false)
      {
          $len = strlen($days[$i]);
          $data["Day"] = $days[$i];
          $data["Day_n"] = intval(($i / 2) + 1);
          $data["Day_end"] = $len + 1;
          $find++;
          break;
      }
  }
  if ($find == 0 || !isset($days))
    error("Wrong Format");

  $n_days_2 = substr($str, $data["Day_end"], 2);
  $n_days_1 = substr($str, $data["Day_end"], 1);

  if (is_numeric($n_days_1) && !is_numeric($n_days_2))
  {
      $data["n_days"] = $n_days_1;
      $data["Day_end"]--;
  }
  else if (is_numeric($n_days_2) && is_numeric($n_days_1))
    $data["n_days"] = $n_days_2;

  if (!array_key_exists('n_days', $data) || $data['n_days'] > 31)
    error("Wrong Format");

  $find = 0;
  for ($i = 0; $i < count($month); $i++)
  {
      if (strpos($str, $month[$i]) !== false)
      {
          $len = strlen($month[$i]);
          $data["Month"] = $month[$i];
          $data["Month_n"] = intval(($i / 2)) + 1;
          $data["Month_end"] = ($data["Day_end"] + 3) + $len;
          $find++;
          break;
      }
  }
  check_days($data["Month"], $data['n_days']);

  if ($find == 0 || !isset($days))
    error("Wrong Format");

  $year = substr($str, $data["Month_end"] + 1, 4);

  if (!is_numeric($year) || strlen($year) !== 4)
    error("Wrong Format");

  $data["year"] = $year;

  $time = substr($str, $data["Month_end"] + 6, strlen($str));

  $split = explode(":", $time);
  $hour = $split[0];
  $min = $split[1];
  $sec = $split[2];

  if (!is_numeric($hour) || !is_numeric($min) || !is_numeric($sec))
      error("Wrong Format");

  if (strlen($hour) !== 2 || strlen($min) !== 2 || strlen($sec) !== 2)
      error("Wrong Format");
  $data["hour"] = $split[0];
  $data["min"] = $split[1];
  $data["sec"] = $split[2];

  return ($data);
}

$data = get_data($argv[1]);

$res = mktime(intval($data["hour"]), intval($data["min"]), intval($data["sec"]), intval($data["Month_n"]), intval($data["n_days"]), intval($data["year"]), 1);

echo "$res\n";

 ?>
