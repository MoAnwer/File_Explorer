<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/style.css">
  <link rel="stylesheet" href="public/bootstrap-icons.css">
  <title>Settings</title>
</head>
<body class="<?= $_COOKIE['theme'] ?? "dark" ?>" style="font-family: <?= $_COOKIE['font'] ?? "system-ui" ?>">
<div class="page">
  <?php include "./header.php"; include "./sidebar.php";?>
  <div class="content">
    <div class="container">
      <h1>Settings</h1>
      <form class="settings-container" method="post" action="./settings.process.php">
        <div class="setting-box">
          <h2>Theme</h2>
          <div class="options">
            <select name="theme">
                <option><?= $_COOKIE['theme']?></option>
                <option name="theme" value="light">light</option>
                <option name="theme" value="dark">dark</option>
              </select>
          </div>
        </div>
        <div class="setting-box">
          <h2>Sort By</h2>
            <div class="options">
              <select name="sort">
                <option><?= $_COOKIE['sort']?></option>
                <option name="sort" value="name">Name</option>
                <option name="sort" value="size">Size</option>
                <option name="sort" value="date">Date</option>
              </select>
          </div>
        </div>
        <div class="setting-box">
          <h2>Font</h2>
            <div class="options">
              <select name="font">
                <option><?= $_COOKIE['font']?></option>
                <option name="font" value="system-ui">system ui</option>
                <option name="font" value="sans-serif">sans serif</option>
                <option name="font" value="monospace">monospace</option>
                <option name="font" value="tajawal">tajawal</option>
              </select>
          </div>
        </div>
        <input type="submit" class="btn btn-primary" value="save">
      </form>
    </div>
    <div class="setting-box">
      <h2><a href="lock.php">
        <i class="bi bi-lock-fill" aria-hidden="true"></i> Lock Folders</a></h2>
      </div>
    </div>
  </div>
</div>
</body>
</html>