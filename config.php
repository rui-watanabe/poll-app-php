<?php
  $url = $_SERVER['REQUEST_URI'];
  define('CURRENT_URI', $url);
  if(preg_match("/(.+(poll))/i", CURRENT_URI, $match)) {
    define('BASE_CONTEXT_PATH', $match['0'].'/');
  }
  define('BASE_IMAGES_PATH', $match['0'].'/images');
  define('BASE_JS_PATH', $match['0'].'/js');
  define('BASE_CSS_PATH', $match['0'].'/css');
  define('SOURCE_PATH', __DIR__.'/php/');

