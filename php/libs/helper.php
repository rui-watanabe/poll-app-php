<?php
function get_param($key, $default_value, $is_post = true) {
  $array = $is_post ? $_POST : $_GET;
  return $array[$key] ?? $default_value;
}

function redirect($path) {
  $path = get_url($path);
  header("Location: {$path}");
  die();
}

function get_url($path) {
  return BASE_CONTEXT_PATH . trim($path, '/');
}