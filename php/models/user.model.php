<?php
  namespace model;

  class UserModel extends AbstractModel{
    public $id;
    public $pwd;
    public $nickname;
    public $del_flg;

    protected static $SESSION_NAME = '_user';

    public static function validate_id($val) {
      $res = true;

      if(empty($val)) {
        Msg::push(Msg::ERROR, 'please input user id');
        $res = false;
      } else {
        if(strlen($val) > 10) {
          Msg::push(Msg::ERROR, 'please user id less than 10 digits');
          $res = false;
        }
        if(!preg_match("/^[a-zA-Z0-9]+$/")) {
          Msg::push(Msg::ERROR, 'please user id half alphanumeric');
          $res = false;
        }
      }

      return $res;
    }
  }