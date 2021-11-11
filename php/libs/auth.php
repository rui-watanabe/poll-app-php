<?php
  namespace lib;

  use db\UserQuery;
  use model\UserModel;

  class Auth {
    public static function login($id, $pwd) {
      try {
        $is_success = false;
        $user = UserQuery::fetchById($id);
    
        if(!empty($user) && $user->del_flg !== 1) {
          if(password_verify($pwd, $user->pwd)) {
            $is_success = true;
            UserModel::setSession($user);
          } else {
            echo 'Unmatch PassWord';
          }
        }
        else {
          echo 'Not Find User';
        }
      } catch(Throwable $e) {
        $is_success = false;
        Msg::push(Msg::DEBUG, $e -> getMessage());
        Msg::push(Msg::ERROR, 'login error');
      }
      
      return $is_success;
    }

    public static function regist($user) {
      try {
        $is_success = false;
        $exist_user = UserQuery::fetchById($user->id);
    
        if(!empty($exit_user)) {
          echo 'Exit User';
          return false;
        }
        $is_success = UserQuery::insert($user);
  
        if($is_success) {
          UserModel::setSession($user);
        }
      } catch(Throwable $e) {
        $is_success = false;
        Msg::push(Msg::DEBUG, $e -> getMessage());
        Msg::push(Msg::ERROR, 'regist error');
      }
    
      return $is_success;
    }

    public static function isLogin() {
      try {
        $user = UserModel::getSession();
      } catch(Throwable $e) {
        $user = UserModel::clearSession();
        Msg::push(Msg::DEBUG, $e -> getMessage());
        Msg::push(Msg::ERROR, 'occurred error please login');
        return false;
      }

      if(isset($user)) {
        return true;
      } else {
        return false;
      }
    }
  }