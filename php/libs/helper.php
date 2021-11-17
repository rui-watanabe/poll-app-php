<?php
function get_param($key, $default_value, $is_post = true) {
  $array = $is_post ? $_POST : $_GET;
  return $array[$key] ?? $default_value;
}

function redirect($path) {
  if($path === GO_HOME) {
    $path = get_url('');
  } else if($path === GO_REFERER) {
    $path = $_SERVER['HTTP_REFERER'];
  } else {
    $path = get_url($patth);
  }
  header("Location: {$path}");
  die();
}

function get_url($path) {
  return BASE_CONTEXT_PATH . trim($path, '/');
}

function is_alnum($val) {
  return preg_match("/^[a-zA-Z0-9]+$/", $val);
}
