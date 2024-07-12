<?php  
  include '../../classes/DirsManger.php'; 
  include '../../classes/FileManger.php';
  // instance classes
  $file_manger = new FileManger();
  $dir_manger = new DirsManger(); 

  $path = $_GET['path'];
  $file_full_name = $file_manger->show_details($path)['full_name'];
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
  <title>Copy</title>
</head>
<body 
  class="<?= $_COOKIE['theme'] ?? "dark" ?>"
  style="font-family: <?= $_COOKIE['font'] ?? "system-ui"?>"
  >
  <div class="edit">
    <div class="container">
      <form class="edit-form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <h2 class="text-primary my-3">Copy To ....</h2>
        <div class="form-group">
          <label for="">Copy Path :</label>
          <input type="text" class="form-control" name="copy_path" required value="<?= dirname($path)?>"/>
        </div>
        <input class="btn btn-primary" type="submit" value="Go" name="update">
      </form>
    </div>
  </div>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file_manger->copy_process(
      $_GET['path'], 
      $_POST["copy_path"], 
      $file_full_name, 
      $_POST['update'], 
      "../../explorer.php?path="
    );
  }
  ?>
</body>
</html>