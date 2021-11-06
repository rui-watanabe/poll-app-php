<?php
  namespace controller\login;

  use lib\Auth;
  use lib\Msg;

  function get() {
    require_once SOURCE_PATH.'views/login.php';
  }


  function login($id, $pwd) {
    $is_success = false;

    $user = UserQuery::fetchById($id);

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
      Msg::push(Msg::INFO, 'auth success');
      redirect(GO_HOME);
    } else {
      Msg::push(Msg::ERROR, 'auth failed');
      redirect(GO_REFERER);
    }
  }