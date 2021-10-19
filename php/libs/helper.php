<?php
function get_param($key, $default_value, $is_post = true) {
  $array = $is_post ? $_POST : $_GET;
  return $array[$key] ?? $default_value;
}
