<?php
  require_once 'config.php';

  require_once 'partials/header.php';

  echo $url;

  if($url === '/poll/login') {
    require_once 'views/login.php';
  }
  else if($url === '/poll/register') {
    require_once 'views/register.php';
  }
  else if($url === '/poll/') {
    require_once 'views/home.php';
  }

  require_once 'partials/footer.php';

?>