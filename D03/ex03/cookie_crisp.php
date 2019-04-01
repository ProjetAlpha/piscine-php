<?php
    if (isset($_GET['action']) && isset($_GET['name']))
    {
      if ($_GET['action'] == "set" && isset($_GET['value']) && !isset($_COOKIE[$_GET['name']]))
      {
          setcookie($_GET['name'], $_GET['value'], (time() + 3600));
      }
      if ($_GET['action'] == "del")
      {
        setcookie($_GET['name'], '', time() - 3600);
      }
      if ($_GET['action'] == "get" && isset($_COOKIE[$_GET['name']]))
      {
          echo "{$_COOKIE[$_GET['name']]}\n";
      }
    }
 ?>
