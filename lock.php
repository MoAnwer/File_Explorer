<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/style.css">
  <link rel="stylesheet" href="public/bootstrap-icons.css">
  <title>Folders Lock</title>
</head>
<body class="<?= $_COOKIE['theme'] ?? "dark" ?>" style="font-family: <?= $_COOKIE['font'] ?? "system-ui" ?>">
<div class="page">
  <?php 
    include "./header.php";
    include "./sidebar.php";
    ?>
  <div class="content">
    <div class="container">
      <h1><i class="bi bi-lock-fill"></i>Lock Folders</h1>
      <form action="" method="post">
        <div class="setting-box">
          <div class="options">
            <input type="text" class="lock-input" name="lock_token"/>
          </div>
          <input type="submit" class="btn" value="add" name='add'>
        </div>
        <?php
          if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['add'])) {
              $lock = $_POST["lock_token"];
              $hashed_lock = sha1("$lock");
              setcookie("lp", $hashed_lock, time() + (86400 * 30), "/");
            }
          }
        ?>
      </form>
    </div>
</div>
