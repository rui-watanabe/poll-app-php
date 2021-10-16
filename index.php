<?php
  require_once 'config.php';

  require_once SOURCE_PATH.'partials/header.php';

  require_once SOURCE_PATH.'models/user.model.php';

  require_once SOURCE_PATH.'db/datasource.php';
  require_once SOURCE_PATH.'db/user.query.php';

  use db\UserQuery;
  $result = UserQuery::fetchById('test');

  var_dump($result);

  $r_path = str_replace(BASE_CONTEXT_PATH, '', $url);
  $method = strtolower($_SERVER['REQUEST_METHOD']);

  route($r_path, $method);

  require_once SOURCE_PATH.'partials/footer.php';

  function route($r_path, $method) {
    if($r_path === '') { $r_path = 'home'; }

    $target_file = SOURCE_PATH ."controllers/{$r_path}.php";

    if(!file_exists($target_file)) { 
      require_once SOURCE_PATH.'views/404.php'; 
      return;
    }
    require_once $target_file;

    $fn = "\\controller\\${r_path}\\${method}";
    $fn();
  }
?>