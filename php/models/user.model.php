<?php
  namespace model;

  use lib\Msg;

  class UserModel extends AbstractModel{
    public $id;
    public $pwd;
    public $nickname;
    public $del_flg;

    protected static $SESSION_NAME = '_user';

    public function isValidateId() {
      return static::validateId($this->id);
    }

    public static function validateId($val) {
      $res = true;

      if(empty($val)) {
        Msg::push(Msg::ERROR, 'please input user id');
        $res = false;
      } else {
        if(strlen($val) > 10) {
          Msg::push(Msg::ERROR, 'please user id less than 10 digits');
          $res = false;
        }
        if(!is_alnum($val)) {
          Msg::push(Msg::ERROR, 'please user id half alphanumeric');
          $res = false;
        }
      }

      return $res;
    }
  }