<?php

namespace frontend\helpers;

/**
 * Custom Dev Defined Class
 */
class Transform 
{
  public static function hyphenated(string $string = null)
  {
    return str_replace(' ', '-', $string);
  }

  public static function wordify(string $string = null)
  {
    return str_replace('&', 'and', $string);
  }

  public static function lowered(string $string = null)
  {
    return strtolower($string);
  }

  public static function build(string $a = null, string $b = null)
  {
    return [
      'name' => $a,
      'slug' => $b
    ];
  }
}

