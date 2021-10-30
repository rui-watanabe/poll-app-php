<?php
  namespace model;

  class UserModel extends AbstractModel{
    public $id;
    public $pwd;
    public $nickname;
    public $del_flg;

    protected static $SESSION_NAME = '_user';
  }