  <?php 
    require_once "./classes/FileManger.php";

    $path = $_GET['file'];

    $manger = new FileManger();
    $name = $manger->show_details($path)['name'];

    $size = $manger->show_details($path)["size"];
    $extension = $manger->show_details($path)["extension"];
    $create_date = $manger->create_date($path);
    $mod_time = $manger->modification_date($path);
    $readable_files_extensions = ["html", "htm", "css", "js", "ts", "php", "scss", "less", "jsx", "txt", "md", "json", "markdown", "vue"];
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/style.css">
  <title><?=$name?></title>
</head>
<body class="<?= $_COOKIE['theme'] ?? "dark"?>" style="font-family: <?= $_COOKIE['font'] ?? "system-ui" ?>">

  <div class="container mt-5">
    <div class="jumbotron">
      <div class="container p-3">
        <h2 class="display-4">
          <?="<img src='./svg/$extension.svg' width='40'>"?>
          <?=$name?>
        </h2>
        <hr>
        <div class="container">
          <ul>
            <li><strong>Location : </strong><span><?=$path?></span></li>
            <li><strong>Size : </strong><span><?=$size?></span></li>
            <li><strong> Create Date : </strong><span><?=$create_date?> </span></li>
            <li><strong>Modification Date : </strong><span><?=$mod_time?></span></li>
            <li><strong>Extension: </strong><span><?=$extension?></span></li>
        </ul>
      </div>
      <hr>
      <a class="btn btn-primary px-5" href="res/actions/edit.php?path=<?=$path?>">Edit</a>
      <a class="btn btn-danger px-5" href="res/actions/delete.php?path=<?=$path?>">Delete</a> 
        <?php 
          if (in_array($extension, $readable_files_extensions)) echo "<a class='btn btn-primary px-5' href='./res/views/editor.php?path=$path'>open</a>";
        ?>
      </div>
    </div>
  </div>
  </fieldset>
</body>
</html>