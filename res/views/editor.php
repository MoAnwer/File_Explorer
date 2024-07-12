<?php
  require_once "../../classes/FileManger.php";
  $manger = new FileManger();
  $path = $_GET['path'];
  $file_name = $manger->show_details($path)['name'];

  if (!FileManger::is_file($path)) {
    header("location: fs/res/views/404.php");
  } else {
    $content = $manger->get_content($path);
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
    <body class="<?= $_COOKIE['theme'] ?? "dark"?>" style="font-family: <?= $_COOKIE['font']?>">
      <div class="container">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <textarea class="edit-area" name="content" placeholder="Type Anything...."><?=trim($content);?></textarea>
        <input type="submit" class="btn" value="save">
        </form>
    </div>
    <?php 
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $content = $_POST['content'];
        if (isset($content)) {
          $manger->set_content($path, $content);
        }
        header("location: ../../details.php?file=$path");
        exit();
      }?>
    </body>
  </html>
  <?php 
  } 