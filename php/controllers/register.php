<?php
  namespace controller\register;

  use lib\Auth;
  use model\UserModel;

  function get() {
    require_once SOURCE_PATH.'views/register.php';
  }

  function post() {

    $user = new UserModel;
    $user->id = get_param('id', '');
    $user->pwd = get_param('pwd', '');
    $user->nickname = get_param('nickname', '');

    if(Auth::regist($user)) {
      redirect(GO_HOME);
      echo 'register success';
    } else {
      redirect(GO_REFERER);
      echo 'register failed';
    }
  }