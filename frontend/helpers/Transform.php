<?php

namespace frontend\helpers;

use himiklab\thumbnail\EasyThumbnailImage;

/**
 * Developer's Custom Class
 * Created by: Ram Delatina
 * Contact: 
 *  ram.delatina.29@gmail.com
 *  github.com/ram-29
 */
class Transform 
{
  /**
   * Variables used in extractCacheUrl function.
   */
  private $template = '';
  private $matches = [];

  /**
   * Custom functions created to support FnProgramming in PHP
   */
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

  /**
   * Returns the extracted cache Url from EasyThumbnailImage.
   * Note: If an official API is released from EasyThumbnailImage, use that instead. 
   */
  public static function extractCacheUrl(string $url, string $height, string $width)
  {
    $template = EasyThumbnailImage::thumbnailImg(str_replace(' ', '%20', $url), $height, $width, EasyThumbnailImage::THUMBNAIL_OUTBOUND);
    preg_match('~([/]\w*){3}([/]\w*.jpg)~', $template, $matches);
    return $matches[0];
  }
}

