<?php
  function ft_split($str)
  {
    $trim = trim(preg_replace('/\s+/', ' ', $str));
    $sep = explode(" ", $trim);
    $sorted = sort($sep);
    return $sep;
  }
 ?>
