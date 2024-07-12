<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/style.css">
  <link rel="stylesheet" href="public/bootstrap-icons.css">
  <title>File Explorer</title>
</head>
<body class="<?= $_COOKIE['theme'] ?? "dark" ?>" style="font-family: <?= $_COOKIE['font'] ?? "system-ui" ?>">
  <?php 
  require_once 'classes/DirsManger.php'; 
  require_once 'classes/FileManger.php';

  $dir_manger = new DirsManger();
  $file_manger = new FileManger();
  
  $current_dir = $dir_manger->chdir("/");
  ?>

  <div class="page">
    <?php 
    include_once "sidebar.php"; 
    include_once "header.php";
    ?>

    <div class="content">
      <div class="profile">
        <h3>Welcome back, Mohamed Anwer</h3>
      </div>
      <div class="drivers-container">
          <h2>Drivers:</h2>
          <div class="drivers">
            <?php 
            foreach ($drivers as $driver) {
              $driver_size = DirsManger::driver_size($driver);
              $driver_free_size =  DirsManger::driver_free_size($driver);
              $progress_width = ((int) $driver_size - (int) $driver_free_size) / 2;
              echo "
              <div class='driver' title='Total Space: $driver_size\n Free: $driver_free_size'>
                <div class='title'>
                  <i class='bi bi-menu-app'></i>
                  <h3>Local Disk ($driver)</h3>
                </div>
                <div class='progress'>
                  <span class='progress-bar' style='width: $progress_width%;'></span>
                </div>
                <h5> $driver_free_size free of $driver_size</h5>
              </div>
              ";
            }
            ?>

          </div>
      </div>
    </div>
  </div>

</body>
</html>