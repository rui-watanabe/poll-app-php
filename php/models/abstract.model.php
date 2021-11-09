<?php
  namespace model;

  abstract class AbstractModel {
    protected static $SESSION_NAME = null;

    public static function setSession($val) {
      if(empty(static::$SESSION_NAME)) {
        throw new Error('Please Set $SESSION_NAME');
      }
      $_SESSION[static::$SESSION_NAME] = $val;
    }

    public static function getSession() {
      return $_SESSION[static::$SESSION_NAME] ? $_SESSION[static::$SESSION_NAME] : null;
    }

    public static function clearSession() {
      static::setSession(null);
    }

    public static function getSessionAndFlush() {
      try {
        return static::getSession();
      } finally {
        static::clearSession();
      }
    }

  }
