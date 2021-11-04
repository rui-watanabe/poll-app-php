<?php
  namespace lib;
  use model\AbstractModel;

  class Msg extends AbstractModel {
    protected static $SESSION_NAME = '_msg';
    public const ERROR = 'error';
    public const INFO = 'info';
    public const DEBUG = 'debug';

    public static function push($type, $msg) {
      if(!is_array(static::getSession())) {
        static::init();
      }
      $msgs = static::getSession();
      $msgs[$type][] = $msg;
      static::setSession($msgs);
    }

    private static function init() {
      static::setSession([
        static::ERROR => [],
        static::INFO => [],
        static::DEBUG => [],
      ]);
    }
  }