<aside>
  <nav>
    <ul>
      <li>
        <a href="explorer.php?path=C:\Users\<?=get_current_user();?>">
          <i class="bi-person-circle"></i> <?=get_current_user();?>
        </a>
      </li>
      <?php
        $letters = "abcdefghijklmnopurstuvwxyz";
        $drivers = [];
        for ($i=0; $i < strlen($letters); $i++) { 
          if (is_dir(ucwords($letters[$i]) . ":")) {
            $driver = ucwords($letters[$i]) . ":";
            echo "
            <li>
              <a href='explorer.php?path=$driver'>
                <i class='bi bi-menu-app-fill'></i>Local Disk ($driver)
              </a>
            </li>
            ";
            $drivers[] = $driver;
          }
        }
      ?>
      <hr/>
      <li>
        <a href="explorer.php?path=C:\Users\<?=get_current_user();?>\Desktop">
          <i class="bi-window"></i> Desktop
        </a>
      </li>
      <li>
        <a href="explorer.php?path=C:\Users\<?=get_current_user();?>\Downloads">
          <i class="bi-download"></i> Downloads
        </a>
      </li>
      <li>
        <a href="explorer.php?path=C:\Users\<?=get_current_user();?>\Music">
          <i class="bi-file-music-fill"></i> Music
        </a>
      </li>
      <li>
        <a href="explorer.php?path=C:\Users\<?=get_current_user();?>\Videos">
          <i class="bi-collection-play-fill"></i> Videos
        </a>
      </li>
      <li>
        <a href="explorer.php?path=C:\Users\<?=get_current_user();?>\Documents">
          <i class="bi-file-text-fill"></i> Documents
        </a>
      </li>
      <hr/>

      <li>
        <a href="settings.php">
          <i class="bi-gear-fill"></i> settings
        </a>
      </li>
    </ul>
  </nav>
</aside>
