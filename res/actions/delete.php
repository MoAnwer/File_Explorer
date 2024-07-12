<?php
  include "../../classes/DirsManger.php";
  include "../../classes/FileManger.php";

  $dirs_manger = new DirsManger();
  $files_manger = new FileManger();

  $path = $_GET['path'];
  if (is_dir($path)) {
    $dirs_manger->remove_dir($path);
  } else {
    $files_manger->remove($path);
  }

  // remove the file/folder from the 'path' to return the parent directory without file/folder 
  $path = explode("\\", $path);
  // return the path as string to pass it to url for redirect
  $path = implode("\\", array_splice($path, 0, count($path) - 1));
  header("location: ../../explorer.php?path=$path");
  exit();