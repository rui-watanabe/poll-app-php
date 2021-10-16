<?php
  namespace controller\login;

  function get() {
    require_once SOURCE_PATH.'views/login.php';
  }

  function login($id, $pwd) {

  }

  function post() {
    $id = $_POST['id'] ?? '';
    $pwd = $_POST['pwd'] ?? '';
    $result = login($id, $pwd);
  }