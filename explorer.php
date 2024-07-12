<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/style.css">
  <link rel="stylesheet" href="public/bootstrap-icons.css">
  <title>Explorer | <?=basename($_GET['path'])?></title>
</head>
<body 
  class="<?= $_COOKIE['theme'] ?? "dark" ?>"
  style="font-family: <?= $_COOKIE['font'] ?? "system-ui"?>"
  >
  <?php 
  include_once "header.php";
  require_once "./classes/DirsManger.php"; 
  require_once "./classes/FileManger.php";
  $file_manger = new FileManger();
  $dir_manger = new DirsManger();
  
  $path = $_GET['path'];
  $dir_manger->chdir($path);

  ?>

  <div class="page">

    <?php include "sidebar.php"?>
    <button onclick="window.history.back()" class="back">
      <i class="bi bi-arrow-left-circle"></i>
    </button>
    <div class="folder-container">
      <div class="location">
        <h3><?= $path?></h3>
      </div>
      <div class="dir-content">
          <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              if (isset($_POST['create_file'])) :
                $file_manger->create_file(trim($_POST['filename']), trim($_POST['filetype']));
              endif;
              if (isset($_POST['create_dir'])) :
                $dir_name = $_POST['directory_name'];
                $dir_manger->create_dir($dir_name);
              endif;
            }
            $dir_content = $dir_manger->show("*");
            $dir_manger->get_dirs($dir_content);
            $file_manger->get_files($dir_content);
            ?>
      </div>
    </div>
  </div>
  

  <?php include "form.php";?>
  <script src="public/app.js"></script>
</body>
</html>