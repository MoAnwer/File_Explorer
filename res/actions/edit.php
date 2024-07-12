<?php  
  include '../../classes/DirsManger.php'; 
  include '../../classes/FileManger.php';

  // instance classes
  $dir_manger = new DirsManger();
  $file_manger = new FileManger();
  $path = $_GET['path'];
  $file_name = $file_manger->show_details($path)['name'];
  $file_extension = $file_manger->show_details($path)['extension'];
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/style.css">
  <title><?=$file_name?></title>
</head>
<body 
  class="<?= $_COOKIE['theme'] ?? "dark" ?>"
  style="font-family: <?= $_COOKIE['font'] ?? "system-ui"?>"
  >
  <div class="edit">
    <div class="container">
      <form class="edit-form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <h2 class="text-primary my-3">Update Info</h2>
        <div class="form-group">
          <label>Name:</label>
          <input type="text" class="form-control" name="updated_name" required value="<?= $file_name?>"/>
          <?php 
            if (FileManger::is_file($path)) :
              ?>
                <label>Extension:</label>
                <input 
                  type="text" 
                  class="form-control" 
                  name="updated_extension" 
                  required 
                  value="<?=$file_extension?>"/>
          <?php endif; 
            if (DirsManger::is_dir($path)) :
              ?>
              <label for="lock">lock</label>
              <input type="checkbox" name="lock" id="lock">
          <?php endif?>
        </div>
        <input class="btn btn-primary" type="submit" value="Update" name="update">
      </form>
    </div>
  </div>
  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updated_name = trim($_POST["updated_name"]);
    $lock_state = $_POST['lock'];


    $file_extension = strtolower(trim(isset($_POST["updated_extension"])));
      if (is_dir($path)) {
        $updated_name = $dir_manger->dirname($path) . "\\" . trim($_POST['updated_name']);
      } elseif(is_file($path)) {
        $updated_name = $dir_manger->dirname($path) . "\\" . trim($_POST['updated_name']) . "." . $file_extension;
        echo $updated_name;
      }

    if (isset($_POST['update'])) {
      $dir_manger->rename_dir($_GET['path'], $updated_name);
    }

     // return the path as string to pass it to url for redirect
    $path = $dir_manger->dirname($path);
    header("location: ../../explorer.php?path=$path");
    exit();
  }
  ?>
</body>
</html>