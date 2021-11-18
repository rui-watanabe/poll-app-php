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

    public static function validatePwd($val)
    {
        $res = true;

        if (empty($val)) {

            Msg::push(Msg::ERROR, 'please input password');
            $res = false;

        } else {

            if(strlen($val) < 4) {

                Msg::push(Msg::ERROR, 'please password more than 4');
                $res = false;

            } 
            
            if(!is_alnum($val)) {

                Msg::push(Msg::ERROR, 'please password half alphanumeric');
                $res = false;

            }
        }

        return $res;
    }

    public function isValidatePwd()
    {
        return static::validatePwd($this->pwd);
    }

    public static function validateNickname($val)
    {

        $res = true;

        if (empty($val)) {

            Msg::push(Msg::ERROR, 'please input nickname');
            $res = false;

        } else {

            if(mb_strlen($val) > 10) {

                Msg::push(Msg::ERROR, 'please user id less than 10 digits');
                $res = false;
                
            } 
        }

        return $res;
    }

    public function isValidateNickname()
    {
        return static::validateNickname($this->nickname);
    }
  }