#!/usr/bin/php
<?php


while (1)
{
  echo "Entrez un nombre: ";
  $handle = fopen("php://stdin","r");
  $line = fgets($handle);
  if(feof($handle)){
    exit;
  }
  if (is_numeric(trim($line)) && trim($line) >= 0)
  {
    if (intval($line % 2) == 0)
    {
      $res = trim($line);
      echo "Le chiffre {$res} est Pair\n";
    }
    else {
        $res = trim($line);
        echo "Le chiffre {$res} est Impair\n";
    }
  }else {
    $res = trim($line);
    echo "'$res' n'est pas un chiffre\n";
  }
  fclose($handle);
}

 ?>
