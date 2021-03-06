<?php

namespace lib;
use Throwable;
// use Error;

function route($rpath, $method) {
  try {
    // throw new Error();

    if($rpath === '') { $rpath = 'home'; }

    $target_file = SOURCE_PATH ."controllers/{$rpath}.php";

    if(!file_exists($target_file)) { 
      require_once SOURCE_PATH.'views/404.php'; 
      return;
    }
    require_once $target_file;

    $fn = "\\controller\\${rpath}\\${method}";
    $fn();
  } catch(Throwable $e) {
    Msg::push(Msg::DEBUG, $e->getMessage());
    Msg::push(Msg::ERROR, 'something error');
    redirect('404');
    // require_once SOURCE_PATH.'views/404.php'; 
  }
}