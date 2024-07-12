<?php
  $theme = setcookie("theme", $_POST["theme"], time() + (86400 * 30), "/");
  $sort  = setcookie("sort", $_POST["sort"], time() + (86400 * 30), "/");
  $font  = setcookie("font", $_POST["font"], time() + (86400 * 30), "/");
  
  header("location: settings.php");
  exit();