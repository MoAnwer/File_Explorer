<?php
class DirsManger {

  public function create_dir($dir_name, $mode = 0777) {
    if(is_dir($dir_name)) {
      return false;
    } else {
      return mkdir($dir_name, $mode);
    }
  }

  public function dirname($path, $levels = 1) {
    return dirname($path, $levels);
  }

  public function show($dir) {
    return glob($dir);
  }

  public function rename_dir($old, $new) {
    if ($old == $new) {
      return false;
    } else {
      return rename($old, $new);
    }
  }

  public function remove_dir($dir_name) {
    if (is_dir($dir_name)) {
      return rmdir($dir_name);
    }
  }

  public function chdir($dir_name) {
    return chdir($dir_name) || header("location: res/views/404.php");
  }

  public function get_path($path) {
    return realpath($path); 
  }

  public function create_date($file_name) {
  $create_date = date('d/m/Y h:ia', stat($file_name)[8]);
  return $create_date;
}

  public function modification_date($file_name) {
    $mod_time = date('d/m/Y h:ia', stat($file_name)[8]);
    return $mod_time;
  }


  public function dir_content($dir, ) {
    $dir_content = glob("$dir/*");
      $dir_count = 0;
      foreach ($dir_content as $key => $value) {
        $dir_count++;
      }
      return $dir_count;
  }

  public function copy($old, $new) {
    return copy($old, $new);
  }
  public function move($old, $new) {
    return rename($old, $new);
  }

  public static function driver_size($driver) {
    return round(disk_total_space($driver)/ 1024  / 1024 / 1024, 1) . " GB";
  }

  public static function driver_free_size($driver) {
    return round(diskfreespace($driver)/ 1024  / 1024 / 1024, 1) . " GB";
  }
  public static function is_dir($dir) {
    return is_dir($dir);
  }

  public function get_dirs($dirs) {
    if (count($dirs) == 0) {
      echo "
      <span class='empty'>
        <img src='./svg/parcel.svg' width='100'>
          This Folder Is Empty
      </span>";
    } else {
      for ($i = 0; $i < count($dirs); $i++) {
        $path = $this->get_path($dirs[$i]);
        $name = $dirs[$i];
        $create_date = $this->create_date($name);
        $folders_num = $this->dir_content($path);
        if (DirsManger::is_dir($dirs[$i])) {
          echo <<<"dirs"
          <div class="card">
          <i class="bi bi-three-dots-vertical"></i>
            <menu>
            <ul>
              <li>
              <a href="res/actions/edit.php?path=$path"><i class="bi bi-pen"></i> Edit</a></li>
                <li><a href="res/actions/delete.php?path=$path"><i class="bi bi-basket"></i> Delete</a></li>
                <li class="copy"><a href="res/actions/copy.php?path=$path">
                <i class="bi bi-clipboard"></i> copy</a></li>
                <li class="move">
                <a href="res/actions/move.php?path=$path">
                <i class="bi bi-share"></i> move</a></li>
            </ul>
            </menu>
              <img src="svg/folder.svg" width="40">
              <div class="card-body">
                <h4 class="card-title">
                  <a href='explorer.php?path=$path'
                  title='Name: $name\nDate Created: $create_date'
                  >$name</a>
                </h4>
              </div>
            </div>
          dirs;
        }
      }
    }
  }
}
?>
