<?php
  namespace model;

  abstract class AbstractModel {
    protected static $SESSION_NAME = null;

    public static function setSession($value) {
      if(empty(static::$SESSION_NAME))
      {
        throw new Error('Please Set $SESSION_NAME');
      }
      $_SESSION[static::$SESSION_NAME] = $value;
    }
  }
