<?php
  namespace controller\login;

  use lib\Auth;

  function get() {
    require_once SOURCE_PATH.'views/login.php';
  }


  function login($id, $pwd) {
    $is_success = false;
    var_dump($id);

    $user = UserQuery::fetchById($id);
    var_dump($user);

    if(!empty($user) && $user->del_flg !== 1) {
      $result = password_verify($pwd, $user->pwd);
      if($result) {
        $is_success = true;
        $_SESSION['user'] = $user;
      } else {
        echo 'Unmatch PassWord';
      }
    }
    else {
      echo 'Not Find User';
    }
    return $is_success;
  }

  function post() {
    $id = get_param('id', '');
    $pwd = get_param('pwd', '');

    if(Auth::login($id, $pwd)) {
      echo 'auth success';
    } else {
      echo 'auth failed';
    }
  }