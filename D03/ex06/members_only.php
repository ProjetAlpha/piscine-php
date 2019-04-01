<?php if (!isset($_SERVER['PHP_AUTH_USER'])): ?>
  <?php header("WWW-Authenticate: Basic realm=''Espace membres''");
        header('HTTP/1.0 401 Unauthorized');
   ?>
<?php endif; ?>

<?php if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])): ?>
  <?php if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys"): ?>
    <?php $file = file_get_contents('../img/42.png');
    $encode = base64_encode($file);
    ?>
<html><body>
Bonjour Zaz<br />
<img src='data:image/png;base64,<?php echo $encode?>'>
</body></html>
  <?php endif; ?>
  <?php if ($_SERVER['PHP_AUTH_USER'] !== "zaz" && $_SERVER['PHP_AUTH_PW'] !== "jaimelespetitsponeys"): ?>
    <?php header("WWW-Authenticate: Basic realm=''Espace membres''");
          header('HTTP/1.0 401 Unauthorized');
          echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
     ?>
  <?php endif; ?>
<?php endif; ?>
