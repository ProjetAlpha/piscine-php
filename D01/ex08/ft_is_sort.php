<?php

  function ft_is_sort($array)
  {
    $i = 0;
    while ($i < count($array))
    {
      $value = $array[$i + 1];
      if ($i + 1 != count($array) && strcmp($array[$i], $array[$i + 1]) > 0)
        return (0);
      $i++;
    }
    return (1);
  }
?>
