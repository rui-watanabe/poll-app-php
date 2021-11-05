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

   public static function flush() {
     $msgs_with_type = static::getSession() ?? [];

     foreach($msgs_with_type as $type => $msgs) {
       foreach($msgs as $msg) {
         echo "<div>{$type}:{$msg}</div>";
       }
     }
   }

    private static function init() {
      static::setSession([
        static::ERROR => [],
        static::INFO => [],
        static::DEBUG => [],
      ]);
    }
  }