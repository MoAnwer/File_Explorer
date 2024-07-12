<?php 
  include '../../classes/DirsManger.php'; 
  include '../../classes/FileManger.php';
  // instance classes
  $dir_manger = new DirsManger();
  $file_manger = new FileManger();
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
  <title>Move</title>
</head>
<body 
  class="<?= $_COOKIE['theme'] ?? "dark" ?>"
  style="font-family: <?= $_COOKIE['font'] ?? "system-ui"?>"
  >
  <div class="edit">
    <div class="container">
      <form class="edit-form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <h2 class="text-primary my-3">move To ....</h2>
        <div class="form-group">
          <label for="">move Path :</label>
          <input type="text" class="form-control" name="move_path" required value="<?= dirname($path)?>"/>
        </div>
        <input class="btn btn-primary" type="submit" value="Go" name="update">
      </form>
    </div>
  </div>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file_manger->move_process(
      $_GET['path'], 
      $_POST["move_path"], 
      $file_full_name, 
      $_POST['update'], 
      "../../explorer.php?path="
    );
  }
  ?>
</body>
</html>