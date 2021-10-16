<?php
  require_once 'config.php';

  require_once SOURCE_PATH.'partials/header.php';

  echo $url;
  echo SOURCE_PATH;

  if($url === '/poll/login') {
    require_once SOURCE_PATH.'controllers/login.php';
  }
  else if($url === '/poll/register') {
    require_once SOURCE_PATH.'controllers/register.php';
  }
  else if($url === '/poll/') {
    require_once SOURCE_PATH.'controllers/home.php';
  }

  require_once SOURCE_PATH.'partials/footer.php';

?>