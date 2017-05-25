<?php
use voku\helper\HtmlDomParser;

class ImageLint_Parser {

  const CSSURLREGEX = "|url\\(['\"]*(.*?)['\"]*\\)|i";

  static function parseHook() {
    ob_start(__CLASS__ . '::parseHandler');
  }

  static function parseHandler($input) {
    return \Imagelint\HtmlParser::parse($input,'http://wordpress.dev',get_site_url());
  }

  static function parseCSSUrl($matches) {
    return 'url("' . self::getUrl($matches[1]) . '")';
  }

  static function getUrl($url) {
    return Imagelint\Imagelint::get($url);
  }

}

?>
