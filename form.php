  <div class="add-folder">
    <span>Add Folder</span>
    <img src="svg/folder.svg" width="40">
  </div>
  <div class="add-file">
    <span>Add File</span>
    <img src="svg/file.svg" width="40">
  </div>

  <div class="overly folder-popup none">
    <div class="form">
      <span class="close">x</span>
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="col-6">
          <h2>New Folder</h2>
          <div class="form-group">
            <input type="text" class="form-control" name="directory_name" placeholder="directory name" required/>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary my-3 black" value="Create Folder" name="create_dir">
          </div>
        </form>
    </div>
  </div>

  <div class="overly file-popup none">
    <div class="form">
      <span class="close">x</span>
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="col-6">
          <h2>New File</h2>
          <div class="form-group">
            <input type="text" class="form-control" name="filename" placeholder="file name" required/><br>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="filetype" placeholder="file type" required/>
          </div>
          <input type="submit" class="btn btn-primary my-3" value="Create" name="create_file">
        </form>
    </div>
  </div>