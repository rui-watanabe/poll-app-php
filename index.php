<?php
  require_once 'config.php';

  require_once SOURCE_PATH.'libs/helper.php';
  require_once SOURCE_PATH.'libs/auth.php';

  require_once SOURCE_PATH.'models/abstract.model.php';
  require_once SOURCE_PATH.'models/user.model.php';

  require_once SOURCE_PATH.'libs/message.php';

  require_once SOURCE_PATH.'db/datasource.php';
  require_once SOURCE_PATH.'db/user.query.php';

  session_start();
  require_once SOURCE_PATH.'partials/header.php';

  use db\UserQuery;
  use function lib\route;
  $result = UserQuery::fetchById('test');

  $rpath = str_replace(BASE_CONTEXT_PATH, '', CURRENT_URI);
  $method = strtolower($_SERVER['REQUEST_METHOD']);

  route($rpath, $method);

  require_once SOURCE_PATH.'partials/footer.php';

  route($rpath, $method);
?>