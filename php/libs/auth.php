<?php
  namespace lib;

  use db\UserQuery;

  class Auth {
    public static function login($id, $pwd) {
      $is_success = false;
      $user = UserQuery::fetchById($id);
  
      if(!empty($user) && $user->del_flg !== 1) {
        if(password_verify($pwd, $user->pwd)) {
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

    public static function regist($user) {
      $is_success = false;
      $exist_user = UserQuery::fetchById($user->id);
  
      if(!empty($exit_user)) {
        echo 'Exit User';
        return false;
      }
      
      $is_success = UserQuery::insert($user);

      if($is_success) {
        $_SESSION['user'] = $user;
      }

      return $is_success;
    }
  }