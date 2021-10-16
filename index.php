<?php
  require_once 'config.php';

  require_once SOURCE_PATH.'partials/header.php';

  $r_path = str_replace(BASE_CONTEXT_PATH, '', $url);

  route($r_path);

  require_once SOURCE_PATH.'partials/footer.php';

  function route($r_path) {
    if($r_path === '') { $r_path = 'home'; }

    $target_file = SOURCE_PATH ."controllers/{$r_path}.php";

    if(!file_exists($target_file)) { 
      require_once SOURCE_PATH.'views/404.php'; 
      return;
    }
    require_once $target_file;
  }
  
?>