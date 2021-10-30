<?php
  namespace controller\register;

  function get() {
    require_once SOURCE_PATH.'views/register.php';
  }

  function post() {
    $id = $_POST['id'] ?? '';
    $pwd = $_POST['pwd'] ?? '';

    if(Auth::regist($id, $pwd, $nickname)) {
      echo 'register success';
    } else {
      echo 'register failed';
    }
  }