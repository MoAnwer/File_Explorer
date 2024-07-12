<?php
class FileManger {
  public $file;
  public $size;
  public $path;
  private $ofr; // opened file resource

  public function choose_file($file_name, $mode = "r") {
    $file = fopen($file_name, $mode);
    fclose($file);
  }

  public function set_content($file_name, $data) {
    file_put_contents($file_name, $data);
  }

  public function get_content($file) {
    return file_get_contents(trim($file));
  }

  
  public static function get_path($path) {
    return realpath($path); 
  }

  public function get_size($file_name) {
    if (filesize($file_name) >= 24 && filesize($file_name) <= 1024*1024 ) {
      return round(filesize($file_name) / 1024 , 1) + 1 . "KB";
    } elseif (filesize($file_name) >= 1024*1024 && filesize($file_name) <= 1024*1024*1024) {
      return round(filesize($file_name) / 1024 / 1024 , 1) . "MB";
    } elseif (filesize($file_name) >= 1024*1024*1024) {
      return round(filesize($file_name) / 1024 / 1024 / 1024, 1) . "GB";
    } else {
      return "0kb";
    }
  }

  public  function show_details($file) {
    return [
      "full_name" => pathinfo($file, PATHINFO_BASENAME),
      "name" => pathinfo($file, PATHINFO_FILENAME) ?? "Unknown",
      "extension" => pathinfo($file)['extension'] ?? "Unknown extension",
      "size" => $this->get_size($file) ?? "Unknown size",
      "create_date" => $this->create_date($file),
      "mod_time" => $this->modification_date($file),
    ];
  }

  public function create_date($file_name) {
    $create_date = date('d/m/Y h:ia', stat($file_name)[8]);
    return $create_date;
  }
  
  public function modification_date($file_name) {
    $mod_time = date('d/m/Y h:ia', stat($file_name)[8]);
    return $mod_time;
  }

  public function create_file($file_name, $type) {
    if (file_exists("$file_name.$type")) {
      echo "<div class='alert alert-danger'>
              <h4 class='alert-heading'>Create Error</h4>
              <p>This file already Exist !!</p>
              <p class='mb-0'></p>
            </div>";
      return false;
    } else {
      $file = fopen("$file_name.$type", "x");
      fclose($file);
    }
  }

  public function remove($file_name) {
    return unlink($file_name);
  }

  public static function is_file($file_name) {
    return is_file($file_name);
  }

  public function copy_process($old_path, $copy_to, $file_name, $action, $redirect) {
     // check if the path end with \ and put it on path if it not exist 
    if ($copy_to[strlen($copy_to) - 1] != "\\") {
      $copy_to[strlen($copy_to)] = "\\";
    }
    // copy to this path
    $copy_path = trim($copy_to) . $file_name;
    if (isset($action)) {
      copy($old_path, $copy_path);
    }
    $redirect_path = $redirect . dirname($copy_path);
    header("location: $redirect_path");
    exit();
  }

  public function move_process($old_path, $move_to, $file_name, $action, $redirect) {
     // check if the path end with \ and put it on path if it is not exist 
    if ($move_to[strlen($move_to) - 1] != "\\") {
      $move_to[strlen($move_to)] = "\\";
    }
    // move to this path
    $move_path = trim($move_to) . $file_name;
    if (isset($action)) {
      rename($old_path, $move_path);
    }
    $redirect_path = $redirect . dirname($move_path);
    header("location: $redirect_path");
    exit();
  }



  public function get_files($files) {
    for ($i = 0; $i < count($files); $i++) {
      $path = $this->get_path($files[$i]);
      if (FileManger::is_file($files[$i])) { 
        $file_name = $this->show_details($files[$i])['name'];
        $file_size = $this->show_details($files[$i])['size'];
        $file_extension = $this->show_details($files[$i])['extension'];
        $file_create_date = $this->show_details($files[$i])['create_date'];
        $icon_src = "svg/$file_extension.svg";
        if ($file_extension == "Unknown extension") {
          $icon_src = "svg/file.svg";
        }
        echo <<<"files"
            <div class="card">
            <i class="bi bi-three-dots-vertical"></i>
            <menu>
              <ul>
                <li><a href="res/actions/edit.php?path=$path"><i class="bi bi-pen-fill"></i> Edit</a></li>
                <li><a href="res/actions/delete.php?path=$path"><i class="bi bi-basket-fill"></i> Delete</a></li>
                <li class="copy"><a href="res/actions/copy.php?path=$path">
                <i class="bi bi-clipboard-fill"></i> copy</a></li>
                <li class="move">
                <a href="res/actions/move.php?path=$path">
                <i class="bi bi-share-fill"></i> move</a></li>
              </ul>
            </menu>
              <img src="$icon_src" width="50">
              <div class="card-body">
                <h4 class="card-title">
                <a href='details.php?file=$path' title='Name: $file_name\nDate: $file_create_date'>$file_name</a>
                </h4>
              </div>
            </div>
        files;
      } 
    } 
    
  } 

}